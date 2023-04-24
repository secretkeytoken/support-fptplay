<?php

namespace MediaCloud\Vendor\Illuminate\View;

use ArrayAccess;
use BadMethodCallException;
use MediaCloud\Vendor\Illuminate\Contracts\Support\Arrayable;
use MediaCloud\Vendor\Illuminate\Contracts\Support\Htmlable;
use MediaCloud\Vendor\Illuminate\Contracts\Support\MessageProvider;
use MediaCloud\Vendor\Illuminate\Contracts\Support\Renderable;
use MediaCloud\Vendor\Illuminate\Contracts\View\Engine;
use MediaCloud\Vendor\Illuminate\Contracts\View\View as ViewContract;
use MediaCloud\Vendor\Illuminate\Support\MessageBag;
use MediaCloud\Vendor\Illuminate\Support\Str;
use MediaCloud\Vendor\Illuminate\Support\Traits\Macroable;
use MediaCloud\Vendor\Illuminate\Support\ViewErrorBag;
use Throwable;

class View implements ArrayAccess, Htmlable, ViewContract
{
    use Macroable {
        __call as macroCall;
    }

    /**
     * The view factory instance.
     *
     * @var \MediaCloud\Vendor\Illuminate\View\Factory
     */
    protected $factory;

    /**
     * The engine implementation.
     *
     * @var \MediaCloud\Vendor\Illuminate\Contracts\View\Engine
     */
    protected $engine;

    /**
     * The name of the view.
     *
     * @var string
     */
    protected $view;

    /**
     * The array of view data.
     *
     * @var array
     */
    protected $data;

    /**
     * The path to the view file.
     *
     * @var string
     */
    protected $path;

    /**
     * Create a new view instance.
     *
     * @param \MediaCloud\Vendor\Illuminate\View\Factory  $factory
     * @param \MediaCloud\Vendor\Illuminate\Contracts\View\Engine  $engine
     * @param  string  $view
     * @param  string  $path
     * @param  mixed  $data
     * @return void
     */
    public function __construct(Factory $factory, Engine $engine, $view, $path, $data = [])
    {
        $this->view = $view;
        $this->path = $path;
        $this->engine = $engine;
        $this->factory = $factory;

        $this->data = $data instanceof Arrayable ? $data->toArray() : (array) $data;
    }

    /**
     * Get the string contents of the view.
     *
     * @param  callable|null  $callback
     * @return array|string
     *
     * @throws \Throwable
     */
    public function render(callable $callback = null)
    {
        try {
            $contents = $this->renderContents();

            $response = isset($callback) ? $callback($this, $contents) : null;

            // Once we have the contents of the view, we will flush the sections if we are
            // done rendering all views so that there is nothing left hanging over when
            // another view gets rendered in the future by the application developer.
            $this->factory->flushStateIfDoneRendering();

            return ! is_null($response) ? $response : $contents;
        } catch (Throwable $e) {
            $this->factory->flushState();

            throw $e;
        }
    }

    /**
     * Get the contents of the view instance.
     *
     * @return string
     */
    protected function renderContents()
    {
        // We will keep track of the amount of views being rendered so we can flush
        // the section after the complete rendering operation is done. This will
        // clear out the sections for any separate views that may be rendered.
        $this->factory->incrementRender();

        $this->factory->callComposer($this);

        $contents = $this->getContents();

        // Once we've finished rendering the view, we'll decrement the render count
        // so that each sections get flushed out next time a view is created and
        // no old sections are staying around in the memory of an environment.
        $this->factory->decrementRender();

        return $contents;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @return string
     */
    protected function getContents()
    {
        return $this->engine->get($this->path, $this->gatherData());
    }

    /**
     * Get the data bound to the view instance.
     *
     * @return array
     */
    public function gatherData()
    {
        $data = array_merge($this->factory->getShared(), $this->data);

        foreach ($data as $key => $value) {
            if ($value instanceof Renderable) {
                $data[$key] = $value->render();
            }
        }

        return $data;
    }

    /**
     * Get the sections of the rendered view.
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function renderSections()
    {
        return $this->render(function () {
            return $this->factory->getSections();
        });
    }

    /**
     * Add a piece of data to the view.
     *
     * @param  string|array  $key
     * @param  mixed  $value
     * @return $this
     */
    public function with($key, $value = null)
    {
        if (is_array($key)) {
            $this->data = array_merge($this->data, $key);
        } else {
            $this->data[$key] = $value;
        }

        return $this;
    }

    /**
     * Add a view instance to the view data.
     *
     * @param  string  $key
     * @param  string  $view
     * @param  array  $data
     * @return $this
     */
    public function nest($key, $view, array $data = [])
    {
        return $this->with($key, $this->factory->make($view, $data));
    }

    /**
     * Add validation errors to the view.
     *
     * @param \MediaCloud\Vendor\Illuminate\Contracts\Support\MessageProvider|array  $provider
     * @param  string  $bag
     * @return $this
     */
    public function withErrors($provider, $bag = 'default')
    {
        return $this->with('errors', (new ViewErrorBag)->put(
            $bag, $this->formatErrors($provider)
        ));
    }

    /**
     * Parse the given errors into an appropriate value.
     *
     * @param \MediaCloud\Vendor\Illuminate\Contracts\Support\MessageProvider|array|string  $provider
     * @return \MediaCloud\Vendor\Illuminate\Support\MessageBag
     */
    protected function formatErrors($provider)
    {
        return $provider instanceof MessageProvider
                        ? $provider->getMessageBag()
                        : new MessageBag((array) $provider);
    }

    /**
     * Get the name of the view.
     *
     * @return string
     */
    public function name()
    {
        return $this->getName();
    }

    /**
     * Get the name of the view.
     *
     * @return string
     */
    public function getName()
    {
        return $this->view;
    }

    /**
     * Get the array of view data.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the path to the view file.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the path to the view.
     *
     * @param  string  $path
     * @return void
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get the view factory instance.
     *
     * @return \MediaCloud\Vendor\Illuminate\View\Factory
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Get the view's rendering engine.
     *
     * @return \MediaCloud\Vendor\Illuminate\Contracts\View\Engine
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Determine if a piece of data is bound.
     *
     * @param  string  $key
     * @return bool
     */
	#[\ReturnTypeWillChange]
    public function offsetExists($key) {
        return array_key_exists($key, $this->data);
    }

    /**
     * Get a piece of bound data to the view.
     *
     * @param  string  $key
     * @return mixed
     */
	#[\ReturnTypeWillChange]
    public function offsetGet($key) {
        return $this->data[$key];
    }

    /**
     * Set a piece of data on the view.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
	#[\ReturnTypeWillChange]
    public function offsetSet($key, $value)
    {
        $this->with($key, $value);
    }

    /**
     * Unset a piece of data from the view.
     *
     * @param  string  $key
     * @return void
     */
	#[\ReturnTypeWillChange]
    public function offsetUnset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * Get a piece of data from the view.
     *
     * @param  string  $key
     * @return mixed
     */
    public function &__get($key)
    {
        return $this->data[$key];
    }

    /**
     * Set a piece of data on the view.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->with($key, $value);
    }

    /**
     * Check if a piece of data is bound to the view.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Remove a piece of bound data from the view.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    /**
     * Dynamically bind parameters to the view.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return \MediaCloud\Vendor\Illuminate\View\View
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        if (! Str::startsWith($method, 'with')) {
            throw new BadMethodCallException(sprintf(
                'Method %s::%s does not exist.', static::class, $method
            ));
        }

        return $this->with(Str::camel(substr($method, 4)), $parameters[0]);
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->render();
    }

    /**
     * Get the string contents of the view.
     *
     * @return string
     *
     * @throws \Throwable
     */
    public function __toString()
    {
        return $this->render();
    }
}

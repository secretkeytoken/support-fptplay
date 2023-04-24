<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MediaCloud\Vendor\Symfony\Component\Messenger\Bridge\Doctrine\Transport;

use Doctrine\DBAL\Exception as DBALException;
use MediaCloud\Vendor\Symfony\Component\Messenger\Envelope;
use MediaCloud\Vendor\Symfony\Component\Messenger\Exception\TransportException;
use MediaCloud\Vendor\Symfony\Component\Messenger\Stamp\DelayStamp;
use MediaCloud\Vendor\Symfony\Component\Messenger\Stamp\TransportMessageIdStamp;
use MediaCloud\Vendor\Symfony\Component\Messenger\Transport\Sender\SenderInterface;
use MediaCloud\Vendor\Symfony\Component\Messenger\Transport\Serialization\PhpSerializer;
use MediaCloud\Vendor\Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

/**
 * @author Vincent Touzet <vincent.touzet@gmail.com>
 */
class DoctrineSender implements SenderInterface
{
    private $connection;
    private $serializer;

    public function __construct(Connection $connection, SerializerInterface $serializer = null)
    {
        $this->connection = $connection;
        $this->serializer = $serializer ?? new PhpSerializer();
    }

    /**
     * {@inheritdoc}
     */
    public function send(Envelope $envelope): Envelope
    {
        $encodedMessage = $this->serializer->encode($envelope);

        /** @var DelayStamp|null $delayStamp */
        $delayStamp = $envelope->last(DelayStamp::class);
        $delay = null !== $delayStamp ? $delayStamp->getDelay() : 0;

        try {
            $id = $this->connection->send($encodedMessage['body'], $encodedMessage['headers'] ?? [], $delay);
        } catch (DBALException $exception) {
            throw new TransportException($exception->getMessage(), 0, $exception);
        }

        return $envelope->with(new TransportMessageIdStamp($id));
    }
}

if (!class_exists(\MediaCloud\Vendor\Symfony\Component\Messenger\Transport\Doctrine\DoctrineSender::class, false)) {
    class_alias(DoctrineSender::class, \MediaCloud\Vendor\Symfony\Component\Messenger\Transport\Doctrine\DoctrineSender::class);
}

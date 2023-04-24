<?php

namespace MediaCloud\Vendor\Aws\IoTThingsGraph;
use MediaCloud\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Things Graph** service.
 * @method \MediaCloud\Vendor\Aws\Result associateEntityToThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise associateEntityToThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createFlowTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createFlowTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createSystemInstance(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createSystemInstanceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createSystemTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createSystemTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteFlowTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteFlowTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteNamespace(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteSystemInstance(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteSystemInstanceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteSystemTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteSystemTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deploySystemInstance(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deploySystemInstanceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deprecateFlowTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deprecateFlowTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deprecateSystemTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deprecateSystemTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeNamespace(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeNamespaceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result dissociateEntityFromThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise dissociateEntityFromThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getEntities(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getEntitiesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getFlowTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getFlowTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getFlowTemplateRevisions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getFlowTemplateRevisionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getNamespaceDeletionStatus(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getNamespaceDeletionStatusAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getSystemInstance(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getSystemInstanceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getSystemTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getSystemTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getSystemTemplateRevisions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getSystemTemplateRevisionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getUploadStatus(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getUploadStatusAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listFlowExecutionMessages(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listFlowExecutionMessagesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchEntities(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchEntitiesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchFlowExecutions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchFlowExecutionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchFlowTemplates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchFlowTemplatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchSystemInstances(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchSystemInstancesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchSystemTemplates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchSystemTemplatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchThings(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchThingsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result tagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result undeploySystemInstance(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise undeploySystemInstanceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result untagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateFlowTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateFlowTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateSystemTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateSystemTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result uploadEntityDefinitions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise uploadEntityDefinitionsAsync(array $args = [])
 */
class IoTThingsGraphClient extends AwsClient {}

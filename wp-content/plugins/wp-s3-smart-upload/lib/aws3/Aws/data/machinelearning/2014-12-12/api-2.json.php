<?php

// This file was auto-generated from sdk-root/src/data/machinelearning/2014-12-12/api-2.json
return ['version' => '2.0', 'metadata' => ['apiVersion' => '2014-12-12', 'endpointPrefix' => 'machinelearning', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'Amazon Machine Learning', 'serviceId' => 'Machine Learning', 'signatureVersion' => 'v4', 'targetPrefix' => 'AmazonML_20141212', 'uid' => 'machinelearning-2014-12-12'], 'operations' => ['AddTags' => ['name' => 'AddTags', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'AddTagsInput'], 'output' => ['shape' => 'AddTagsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InvalidTagException'], ['shape' => 'TagLimitExceededException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'CreateBatchPrediction' => ['name' => 'CreateBatchPrediction', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateBatchPredictionInput'], 'output' => ['shape' => 'CreateBatchPredictionOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateDataSourceFromRDS' => ['name' => 'CreateDataSourceFromRDS', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateDataSourceFromRDSInput'], 'output' => ['shape' => 'CreateDataSourceFromRDSOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateDataSourceFromRedshift' => ['name' => 'CreateDataSourceFromRedshift', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateDataSourceFromRedshiftInput'], 'output' => ['shape' => 'CreateDataSourceFromRedshiftOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateDataSourceFromS3' => ['name' => 'CreateDataSourceFromS3', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateDataSourceFromS3Input'], 'output' => ['shape' => 'CreateDataSourceFromS3Output'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateEvaluation' => ['name' => 'CreateEvaluation', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateEvaluationInput'], 'output' => ['shape' => 'CreateEvaluationOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateMLModel' => ['name' => 'CreateMLModel', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateMLModelInput'], 'output' => ['shape' => 'CreateMLModelOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException'], ['shape' => 'IdempotentParameterMismatchException']]], 'CreateRealtimeEndpoint' => ['name' => 'CreateRealtimeEndpoint', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'CreateRealtimeEndpointInput'], 'output' => ['shape' => 'CreateRealtimeEndpointOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteBatchPrediction' => ['name' => 'DeleteBatchPrediction', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteBatchPredictionInput'], 'output' => ['shape' => 'DeleteBatchPredictionOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteDataSource' => ['name' => 'DeleteDataSource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteDataSourceInput'], 'output' => ['shape' => 'DeleteDataSourceOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteEvaluation' => ['name' => 'DeleteEvaluation', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteEvaluationInput'], 'output' => ['shape' => 'DeleteEvaluationOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteMLModel' => ['name' => 'DeleteMLModel', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteMLModelInput'], 'output' => ['shape' => 'DeleteMLModelOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteRealtimeEndpoint' => ['name' => 'DeleteRealtimeEndpoint', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteRealtimeEndpointInput'], 'output' => ['shape' => 'DeleteRealtimeEndpointOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DeleteTags' => ['name' => 'DeleteTags', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DeleteTagsInput'], 'output' => ['shape' => 'DeleteTagsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InvalidTagException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'DescribeBatchPredictions' => ['name' => 'DescribeBatchPredictions', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeBatchPredictionsInput'], 'output' => ['shape' => 'DescribeBatchPredictionsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException']]], 'DescribeDataSources' => ['name' => 'DescribeDataSources', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeDataSourcesInput'], 'output' => ['shape' => 'DescribeDataSourcesOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException']]], 'DescribeEvaluations' => ['name' => 'DescribeEvaluations', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeEvaluationsInput'], 'output' => ['shape' => 'DescribeEvaluationsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException']]], 'DescribeMLModels' => ['name' => 'DescribeMLModels', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeMLModelsInput'], 'output' => ['shape' => 'DescribeMLModelsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'InternalServerException']]], 'DescribeTags' => ['name' => 'DescribeTags', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'DescribeTagsInput'], 'output' => ['shape' => 'DescribeTagsOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'GetBatchPrediction' => ['name' => 'GetBatchPrediction', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GetBatchPredictionInput'], 'output' => ['shape' => 'GetBatchPredictionOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'GetDataSource' => ['name' => 'GetDataSource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GetDataSourceInput'], 'output' => ['shape' => 'GetDataSourceOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'GetEvaluation' => ['name' => 'GetEvaluation', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GetEvaluationInput'], 'output' => ['shape' => 'GetEvaluationOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'GetMLModel' => ['name' => 'GetMLModel', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'GetMLModelInput'], 'output' => ['shape' => 'GetMLModelOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'Predict' => ['name' => 'Predict', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'PredictInput'], 'output' => ['shape' => 'PredictOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'LimitExceededException'], ['shape' => 'InternalServerException'], ['shape' => 'PredictorNotMountedException']]], 'UpdateBatchPrediction' => ['name' => 'UpdateBatchPrediction', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateBatchPredictionInput'], 'output' => ['shape' => 'UpdateBatchPredictionOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'UpdateDataSource' => ['name' => 'UpdateDataSource', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateDataSourceInput'], 'output' => ['shape' => 'UpdateDataSourceOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'UpdateEvaluation' => ['name' => 'UpdateEvaluation', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateEvaluationInput'], 'output' => ['shape' => 'UpdateEvaluationOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]], 'UpdateMLModel' => ['name' => 'UpdateMLModel', 'http' => ['method' => 'POST', 'requestUri' => '/'], 'input' => ['shape' => 'UpdateMLModelInput'], 'output' => ['shape' => 'UpdateMLModelOutput'], 'errors' => [['shape' => 'InvalidInputException'], ['shape' => 'ResourceNotFoundException'], ['shape' => 'InternalServerException']]]], 'shapes' => ['AddTagsInput' => ['type' => 'structure', 'required' => ['Tags', 'ResourceId', 'ResourceType'], 'members' => ['Tags' => ['shape' => 'TagList'], 'ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType']]], 'AddTagsOutput' => ['type' => 'structure', 'members' => ['ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType']]], 'Algorithm' => ['type' => 'string', 'enum' => ['sgd']], 'AwsUserArn' => ['type' => 'string', 'pattern' => 'arn:aws:iam::[0-9]+:((user/.+)|(root))'], 'BatchPrediction' => ['type' => 'structure', 'members' => ['BatchPredictionId' => ['shape' => 'EntityId'], 'MLModelId' => ['shape' => 'EntityId'], 'BatchPredictionDataSourceId' => ['shape' => 'EntityId'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'OutputUri' => ['shape' => 'S3Url'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime'], 'TotalRecordCount' => ['shape' => 'LongType'], 'InvalidRecordCount' => ['shape' => 'LongType']]], 'BatchPredictionFilterVariable' => ['type' => 'string', 'enum' => ['CreatedAt', 'LastUpdatedAt', 'Status', 'Name', 'IAMUser', 'MLModelId', 'DataSourceId', 'DataURI']], 'BatchPredictions' => ['type' => 'list', 'member' => ['shape' => 'BatchPrediction']], 'ComparatorValue' => ['type' => 'string', 'max' => 1024, 'pattern' => '.*\\S.*|^$'], 'ComputeStatistics' => ['type' => 'boolean'], 'CreateBatchPredictionInput' => ['type' => 'structure', 'required' => ['BatchPredictionId', 'MLModelId', 'BatchPredictionDataSourceId', 'OutputUri'], 'members' => ['BatchPredictionId' => ['shape' => 'EntityId'], 'BatchPredictionName' => ['shape' => 'EntityName'], 'MLModelId' => ['shape' => 'EntityId'], 'BatchPredictionDataSourceId' => ['shape' => 'EntityId'], 'OutputUri' => ['shape' => 'S3Url']]], 'CreateBatchPredictionOutput' => ['type' => 'structure', 'members' => ['BatchPredictionId' => ['shape' => 'EntityId']]], 'CreateDataSourceFromRDSInput' => ['type' => 'structure', 'required' => ['DataSourceId', 'RDSData', 'RoleARN'], 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataSourceName' => ['shape' => 'EntityName'], 'RDSData' => ['shape' => 'RDSDataSpec'], 'RoleARN' => ['shape' => 'RoleARN'], 'ComputeStatistics' => ['shape' => 'ComputeStatistics']]], 'CreateDataSourceFromRDSOutput' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'CreateDataSourceFromRedshiftInput' => ['type' => 'structure', 'required' => ['DataSourceId', 'DataSpec', 'RoleARN'], 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataSourceName' => ['shape' => 'EntityName'], 'DataSpec' => ['shape' => 'RedshiftDataSpec'], 'RoleARN' => ['shape' => 'RoleARN'], 'ComputeStatistics' => ['shape' => 'ComputeStatistics']]], 'CreateDataSourceFromRedshiftOutput' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'CreateDataSourceFromS3Input' => ['type' => 'structure', 'required' => ['DataSourceId', 'DataSpec'], 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataSourceName' => ['shape' => 'EntityName'], 'DataSpec' => ['shape' => 'S3DataSpec'], 'ComputeStatistics' => ['shape' => 'ComputeStatistics']]], 'CreateDataSourceFromS3Output' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'CreateEvaluationInput' => ['type' => 'structure', 'required' => ['EvaluationId', 'MLModelId', 'EvaluationDataSourceId'], 'members' => ['EvaluationId' => ['shape' => 'EntityId'], 'EvaluationName' => ['shape' => 'EntityName'], 'MLModelId' => ['shape' => 'EntityId'], 'EvaluationDataSourceId' => ['shape' => 'EntityId']]], 'CreateEvaluationOutput' => ['type' => 'structure', 'members' => ['EvaluationId' => ['shape' => 'EntityId']]], 'CreateMLModelInput' => ['type' => 'structure', 'required' => ['MLModelId', 'MLModelType', 'TrainingDataSourceId'], 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'MLModelName' => ['shape' => 'EntityName'], 'MLModelType' => ['shape' => 'MLModelType'], 'Parameters' => ['shape' => 'TrainingParameters'], 'TrainingDataSourceId' => ['shape' => 'EntityId'], 'Recipe' => ['shape' => 'Recipe'], 'RecipeUri' => ['shape' => 'S3Url']]], 'CreateMLModelOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'CreateRealtimeEndpointInput' => ['type' => 'structure', 'required' => ['MLModelId'], 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'CreateRealtimeEndpointOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'RealtimeEndpointInfo' => ['shape' => 'RealtimeEndpointInfo']]], 'DataRearrangement' => ['type' => 'string'], 'DataSchema' => ['type' => 'string', 'max' => 131071], 'DataSource' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataLocationS3' => ['shape' => 'S3Url'], 'DataRearrangement' => ['shape' => 'DataRearrangement'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'DataSizeInBytes' => ['shape' => 'LongType'], 'NumberOfFiles' => ['shape' => 'LongType'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'Message' => ['shape' => 'Message'], 'RedshiftMetadata' => ['shape' => 'RedshiftMetadata'], 'RDSMetadata' => ['shape' => 'RDSMetadata'], 'RoleARN' => ['shape' => 'RoleARN'], 'ComputeStatistics' => ['shape' => 'ComputeStatistics'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime']]], 'DataSourceFilterVariable' => ['type' => 'string', 'enum' => ['CreatedAt', 'LastUpdatedAt', 'Status', 'Name', 'DataLocationS3', 'IAMUser']], 'DataSources' => ['type' => 'list', 'member' => ['shape' => 'DataSource']], 'DeleteBatchPredictionInput' => ['type' => 'structure', 'required' => ['BatchPredictionId'], 'members' => ['BatchPredictionId' => ['shape' => 'EntityId']]], 'DeleteBatchPredictionOutput' => ['type' => 'structure', 'members' => ['BatchPredictionId' => ['shape' => 'EntityId']]], 'DeleteDataSourceInput' => ['type' => 'structure', 'required' => ['DataSourceId'], 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'DeleteDataSourceOutput' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'DeleteEvaluationInput' => ['type' => 'structure', 'required' => ['EvaluationId'], 'members' => ['EvaluationId' => ['shape' => 'EntityId']]], 'DeleteEvaluationOutput' => ['type' => 'structure', 'members' => ['EvaluationId' => ['shape' => 'EntityId']]], 'DeleteMLModelInput' => ['type' => 'structure', 'required' => ['MLModelId'], 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'DeleteMLModelOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'DeleteRealtimeEndpointInput' => ['type' => 'structure', 'required' => ['MLModelId'], 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'DeleteRealtimeEndpointOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'RealtimeEndpointInfo' => ['shape' => 'RealtimeEndpointInfo']]], 'DeleteTagsInput' => ['type' => 'structure', 'required' => ['TagKeys', 'ResourceId', 'ResourceType'], 'members' => ['TagKeys' => ['shape' => 'TagKeyList'], 'ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType']]], 'DeleteTagsOutput' => ['type' => 'structure', 'members' => ['ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType']]], 'DescribeBatchPredictionsInput' => ['type' => 'structure', 'members' => ['FilterVariable' => ['shape' => 'BatchPredictionFilterVariable'], 'EQ' => ['shape' => 'ComparatorValue'], 'GT' => ['shape' => 'ComparatorValue'], 'LT' => ['shape' => 'ComparatorValue'], 'GE' => ['shape' => 'ComparatorValue'], 'LE' => ['shape' => 'ComparatorValue'], 'NE' => ['shape' => 'ComparatorValue'], 'Prefix' => ['shape' => 'ComparatorValue'], 'SortOrder' => ['shape' => 'SortOrder'], 'NextToken' => ['shape' => 'StringType'], 'Limit' => ['shape' => 'PageLimit']]], 'DescribeBatchPredictionsOutput' => ['type' => 'structure', 'members' => ['Results' => ['shape' => 'BatchPredictions'], 'NextToken' => ['shape' => 'StringType']]], 'DescribeDataSourcesInput' => ['type' => 'structure', 'members' => ['FilterVariable' => ['shape' => 'DataSourceFilterVariable'], 'EQ' => ['shape' => 'ComparatorValue'], 'GT' => ['shape' => 'ComparatorValue'], 'LT' => ['shape' => 'ComparatorValue'], 'GE' => ['shape' => 'ComparatorValue'], 'LE' => ['shape' => 'ComparatorValue'], 'NE' => ['shape' => 'ComparatorValue'], 'Prefix' => ['shape' => 'ComparatorValue'], 'SortOrder' => ['shape' => 'SortOrder'], 'NextToken' => ['shape' => 'StringType'], 'Limit' => ['shape' => 'PageLimit']]], 'DescribeDataSourcesOutput' => ['type' => 'structure', 'members' => ['Results' => ['shape' => 'DataSources'], 'NextToken' => ['shape' => 'StringType']]], 'DescribeEvaluationsInput' => ['type' => 'structure', 'members' => ['FilterVariable' => ['shape' => 'EvaluationFilterVariable'], 'EQ' => ['shape' => 'ComparatorValue'], 'GT' => ['shape' => 'ComparatorValue'], 'LT' => ['shape' => 'ComparatorValue'], 'GE' => ['shape' => 'ComparatorValue'], 'LE' => ['shape' => 'ComparatorValue'], 'NE' => ['shape' => 'ComparatorValue'], 'Prefix' => ['shape' => 'ComparatorValue'], 'SortOrder' => ['shape' => 'SortOrder'], 'NextToken' => ['shape' => 'StringType'], 'Limit' => ['shape' => 'PageLimit']]], 'DescribeEvaluationsOutput' => ['type' => 'structure', 'members' => ['Results' => ['shape' => 'Evaluations'], 'NextToken' => ['shape' => 'StringType']]], 'DescribeMLModelsInput' => ['type' => 'structure', 'members' => ['FilterVariable' => ['shape' => 'MLModelFilterVariable'], 'EQ' => ['shape' => 'ComparatorValue'], 'GT' => ['shape' => 'ComparatorValue'], 'LT' => ['shape' => 'ComparatorValue'], 'GE' => ['shape' => 'ComparatorValue'], 'LE' => ['shape' => 'ComparatorValue'], 'NE' => ['shape' => 'ComparatorValue'], 'Prefix' => ['shape' => 'ComparatorValue'], 'SortOrder' => ['shape' => 'SortOrder'], 'NextToken' => ['shape' => 'StringType'], 'Limit' => ['shape' => 'PageLimit']]], 'DescribeMLModelsOutput' => ['type' => 'structure', 'members' => ['Results' => ['shape' => 'MLModels'], 'NextToken' => ['shape' => 'StringType']]], 'DescribeTagsInput' => ['type' => 'structure', 'required' => ['ResourceId', 'ResourceType'], 'members' => ['ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType']]], 'DescribeTagsOutput' => ['type' => 'structure', 'members' => ['ResourceId' => ['shape' => 'EntityId'], 'ResourceType' => ['shape' => 'TaggableResourceType'], 'Tags' => ['shape' => 'TagList']]], 'DetailsAttributes' => ['type' => 'string', 'enum' => ['PredictiveModelType', 'Algorithm']], 'DetailsMap' => ['type' => 'map', 'key' => ['shape' => 'DetailsAttributes'], 'value' => ['shape' => 'DetailsValue']], 'DetailsValue' => ['type' => 'string', 'min' => 1], 'EDPPipelineId' => ['type' => 'string', 'max' => 1024, 'min' => 1], 'EDPResourceRole' => ['type' => 'string', 'max' => 64, 'min' => 1], 'EDPSecurityGroupId' => ['type' => 'string', 'max' => 255, 'min' => 1], 'EDPSecurityGroupIds' => ['type' => 'list', 'member' => ['shape' => 'EDPSecurityGroupId']], 'EDPServiceRole' => ['type' => 'string', 'max' => 64, 'min' => 1], 'EDPSubnetId' => ['type' => 'string', 'max' => 255, 'min' => 1], 'EntityId' => ['type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[a-zA-Z0-9_.-]+'], 'EntityName' => ['type' => 'string', 'max' => 1024, 'pattern' => '.*\\S.*|^$'], 'EntityStatus' => ['type' => 'string', 'enum' => ['PENDING', 'INPROGRESS', 'FAILED', 'COMPLETED', 'DELETED']], 'EpochTime' => ['type' => 'timestamp'], 'ErrorCode' => ['type' => 'integer'], 'ErrorMessage' => ['type' => 'string', 'max' => 2048], 'Evaluation' => ['type' => 'structure', 'members' => ['EvaluationId' => ['shape' => 'EntityId'], 'MLModelId' => ['shape' => 'EntityId'], 'EvaluationDataSourceId' => ['shape' => 'EntityId'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'PerformanceMetrics' => ['shape' => 'PerformanceMetrics'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime']]], 'EvaluationFilterVariable' => ['type' => 'string', 'enum' => ['CreatedAt', 'LastUpdatedAt', 'Status', 'Name', 'IAMUser', 'MLModelId', 'DataSourceId', 'DataURI']], 'Evaluations' => ['type' => 'list', 'member' => ['shape' => 'Evaluation']], 'GetBatchPredictionInput' => ['type' => 'structure', 'required' => ['BatchPredictionId'], 'members' => ['BatchPredictionId' => ['shape' => 'EntityId']]], 'GetBatchPredictionOutput' => ['type' => 'structure', 'members' => ['BatchPredictionId' => ['shape' => 'EntityId'], 'MLModelId' => ['shape' => 'EntityId'], 'BatchPredictionDataSourceId' => ['shape' => 'EntityId'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'OutputUri' => ['shape' => 'S3Url'], 'LogUri' => ['shape' => 'PresignedS3Url'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime'], 'TotalRecordCount' => ['shape' => 'LongType'], 'InvalidRecordCount' => ['shape' => 'LongType']]], 'GetDataSourceInput' => ['type' => 'structure', 'required' => ['DataSourceId'], 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'Verbose' => ['shape' => 'Verbose']]], 'GetDataSourceOutput' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataLocationS3' => ['shape' => 'S3Url'], 'DataRearrangement' => ['shape' => 'DataRearrangement'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'DataSizeInBytes' => ['shape' => 'LongType'], 'NumberOfFiles' => ['shape' => 'LongType'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'LogUri' => ['shape' => 'PresignedS3Url'], 'Message' => ['shape' => 'Message'], 'RedshiftMetadata' => ['shape' => 'RedshiftMetadata'], 'RDSMetadata' => ['shape' => 'RDSMetadata'], 'RoleARN' => ['shape' => 'RoleARN'], 'ComputeStatistics' => ['shape' => 'ComputeStatistics'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime'], 'DataSourceSchema' => ['shape' => 'DataSchema']]], 'GetEvaluationInput' => ['type' => 'structure', 'required' => ['EvaluationId'], 'members' => ['EvaluationId' => ['shape' => 'EntityId']]], 'GetEvaluationOutput' => ['type' => 'structure', 'members' => ['EvaluationId' => ['shape' => 'EntityId'], 'MLModelId' => ['shape' => 'EntityId'], 'EvaluationDataSourceId' => ['shape' => 'EntityId'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'EntityName'], 'Status' => ['shape' => 'EntityStatus'], 'PerformanceMetrics' => ['shape' => 'PerformanceMetrics'], 'LogUri' => ['shape' => 'PresignedS3Url'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime']]], 'GetMLModelInput' => ['type' => 'structure', 'required' => ['MLModelId'], 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'Verbose' => ['shape' => 'Verbose']]], 'GetMLModelOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'TrainingDataSourceId' => ['shape' => 'EntityId'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'MLModelName'], 'Status' => ['shape' => 'EntityStatus'], 'SizeInBytes' => ['shape' => 'LongType'], 'EndpointInfo' => ['shape' => 'RealtimeEndpointInfo'], 'TrainingParameters' => ['shape' => 'TrainingParameters'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'MLModelType' => ['shape' => 'MLModelType'], 'ScoreThreshold' => ['shape' => 'ScoreThreshold'], 'ScoreThresholdLastUpdatedAt' => ['shape' => 'EpochTime'], 'LogUri' => ['shape' => 'PresignedS3Url'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime'], 'Recipe' => ['shape' => 'Recipe'], 'Schema' => ['shape' => 'DataSchema']]], 'IdempotentParameterMismatchException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage'], 'code' => ['shape' => 'ErrorCode']], 'exception' => \true], 'IntegerType' => ['type' => 'integer'], 'InternalServerException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage'], 'code' => ['shape' => 'ErrorCode']], 'exception' => \true, 'fault' => \true], 'InvalidInputException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage'], 'code' => ['shape' => 'ErrorCode']], 'exception' => \true], 'InvalidTagException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'Label' => ['type' => 'string', 'min' => 1], 'LimitExceededException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage'], 'code' => ['shape' => 'ErrorCode']], 'exception' => \true], 'LongType' => ['type' => 'long'], 'MLModel' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'TrainingDataSourceId' => ['shape' => 'EntityId'], 'CreatedByIamUser' => ['shape' => 'AwsUserArn'], 'CreatedAt' => ['shape' => 'EpochTime'], 'LastUpdatedAt' => ['shape' => 'EpochTime'], 'Name' => ['shape' => 'MLModelName'], 'Status' => ['shape' => 'EntityStatus'], 'SizeInBytes' => ['shape' => 'LongType'], 'EndpointInfo' => ['shape' => 'RealtimeEndpointInfo'], 'TrainingParameters' => ['shape' => 'TrainingParameters'], 'InputDataLocationS3' => ['shape' => 'S3Url'], 'Algorithm' => ['shape' => 'Algorithm'], 'MLModelType' => ['shape' => 'MLModelType'], 'ScoreThreshold' => ['shape' => 'ScoreThreshold'], 'ScoreThresholdLastUpdatedAt' => ['shape' => 'EpochTime'], 'Message' => ['shape' => 'Message'], 'ComputeTime' => ['shape' => 'LongType'], 'FinishedAt' => ['shape' => 'EpochTime'], 'StartedAt' => ['shape' => 'EpochTime']]], 'MLModelFilterVariable' => ['type' => 'string', 'enum' => ['CreatedAt', 'LastUpdatedAt', 'Status', 'Name', 'IAMUser', 'TrainingDataSourceId', 'RealtimeEndpointStatus', 'MLModelType', 'Algorithm', 'TrainingDataURI']], 'MLModelName' => ['type' => 'string', 'max' => 1024], 'MLModelType' => ['type' => 'string', 'enum' => ['REGRESSION', 'BINARY', 'MULTICLASS']], 'MLModels' => ['type' => 'list', 'member' => ['shape' => 'MLModel']], 'Message' => ['type' => 'string', 'max' => 10240], 'PageLimit' => ['type' => 'integer', 'max' => 100, 'min' => 1], 'PerformanceMetrics' => ['type' => 'structure', 'members' => ['Properties' => ['shape' => 'PerformanceMetricsProperties']]], 'PerformanceMetricsProperties' => ['type' => 'map', 'key' => ['shape' => 'PerformanceMetricsPropertyKey'], 'value' => ['shape' => 'PerformanceMetricsPropertyValue']], 'PerformanceMetricsPropertyKey' => ['type' => 'string'], 'PerformanceMetricsPropertyValue' => ['type' => 'string'], 'PredictInput' => ['type' => 'structure', 'required' => ['MLModelId', 'Record', 'PredictEndpoint'], 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'Record' => ['shape' => 'Record'], 'PredictEndpoint' => ['shape' => 'VipURL']]], 'PredictOutput' => ['type' => 'structure', 'members' => ['Prediction' => ['shape' => 'Prediction']]], 'Prediction' => ['type' => 'structure', 'members' => ['predictedLabel' => ['shape' => 'Label'], 'predictedValue' => ['shape' => 'floatLabel'], 'predictedScores' => ['shape' => 'ScoreValuePerLabelMap'], 'details' => ['shape' => 'DetailsMap']]], 'PredictorNotMountedException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'PresignedS3Url' => ['type' => 'string'], 'RDSDataSpec' => ['type' => 'structure', 'required' => ['DatabaseInformation', 'SelectSqlQuery', 'DatabaseCredentials', 'S3StagingLocation', 'ResourceRole', 'ServiceRole', 'SubnetId', 'SecurityGroupIds'], 'members' => ['DatabaseInformation' => ['shape' => 'RDSDatabase'], 'SelectSqlQuery' => ['shape' => 'RDSSelectSqlQuery'], 'DatabaseCredentials' => ['shape' => 'RDSDatabaseCredentials'], 'S3StagingLocation' => ['shape' => 'S3Url'], 'DataRearrangement' => ['shape' => 'DataRearrangement'], 'DataSchema' => ['shape' => 'DataSchema'], 'DataSchemaUri' => ['shape' => 'S3Url'], 'ResourceRole' => ['shape' => 'EDPResourceRole'], 'ServiceRole' => ['shape' => 'EDPServiceRole'], 'SubnetId' => ['shape' => 'EDPSubnetId'], 'SecurityGroupIds' => ['shape' => 'EDPSecurityGroupIds']]], 'RDSDatabase' => ['type' => 'structure', 'required' => ['InstanceIdentifier', 'DatabaseName'], 'members' => ['InstanceIdentifier' => ['shape' => 'RDSInstanceIdentifier'], 'DatabaseName' => ['shape' => 'RDSDatabaseName']]], 'RDSDatabaseCredentials' => ['type' => 'structure', 'required' => ['Username', 'Password'], 'members' => ['Username' => ['shape' => 'RDSDatabaseUsername'], 'Password' => ['shape' => 'RDSDatabasePassword']]], 'RDSDatabaseName' => ['type' => 'string', 'max' => 64, 'min' => 1], 'RDSDatabasePassword' => ['type' => 'string', 'max' => 128, 'min' => 8], 'RDSDatabaseUsername' => ['type' => 'string', 'max' => 128, 'min' => 1], 'RDSInstanceIdentifier' => ['type' => 'string', 'max' => 63, 'min' => 1, 'pattern' => '[a-z0-9-]+'], 'RDSMetadata' => ['type' => 'structure', 'members' => ['Database' => ['shape' => 'RDSDatabase'], 'DatabaseUserName' => ['shape' => 'RDSDatabaseUsername'], 'SelectSqlQuery' => ['shape' => 'RDSSelectSqlQuery'], 'ResourceRole' => ['shape' => 'EDPResourceRole'], 'ServiceRole' => ['shape' => 'EDPServiceRole'], 'DataPipelineId' => ['shape' => 'EDPPipelineId']]], 'RDSSelectSqlQuery' => ['type' => 'string', 'max' => 16777216, 'min' => 1], 'RealtimeEndpointInfo' => ['type' => 'structure', 'members' => ['PeakRequestsPerSecond' => ['shape' => 'IntegerType'], 'CreatedAt' => ['shape' => 'EpochTime'], 'EndpointUrl' => ['shape' => 'VipURL'], 'EndpointStatus' => ['shape' => 'RealtimeEndpointStatus']]], 'RealtimeEndpointStatus' => ['type' => 'string', 'enum' => ['NONE', 'READY', 'UPDATING', 'FAILED']], 'Recipe' => ['type' => 'string', 'max' => 131071], 'Record' => ['type' => 'map', 'key' => ['shape' => 'VariableName'], 'value' => ['shape' => 'VariableValue']], 'RedshiftClusterIdentifier' => ['type' => 'string', 'max' => 63, 'min' => 1, 'pattern' => '[a-z0-9-]+'], 'RedshiftDataSpec' => ['type' => 'structure', 'required' => ['DatabaseInformation', 'SelectSqlQuery', 'DatabaseCredentials', 'S3StagingLocation'], 'members' => ['DatabaseInformation' => ['shape' => 'RedshiftDatabase'], 'SelectSqlQuery' => ['shape' => 'RedshiftSelectSqlQuery'], 'DatabaseCredentials' => ['shape' => 'RedshiftDatabaseCredentials'], 'S3StagingLocation' => ['shape' => 'S3Url'], 'DataRearrangement' => ['shape' => 'DataRearrangement'], 'DataSchema' => ['shape' => 'DataSchema'], 'DataSchemaUri' => ['shape' => 'S3Url']]], 'RedshiftDatabase' => ['type' => 'structure', 'required' => ['DatabaseName', 'ClusterIdentifier'], 'members' => ['DatabaseName' => ['shape' => 'RedshiftDatabaseName'], 'ClusterIdentifier' => ['shape' => 'RedshiftClusterIdentifier']]], 'RedshiftDatabaseCredentials' => ['type' => 'structure', 'required' => ['Username', 'Password'], 'members' => ['Username' => ['shape' => 'RedshiftDatabaseUsername'], 'Password' => ['shape' => 'RedshiftDatabasePassword']]], 'RedshiftDatabaseName' => ['type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[a-z0-9]+'], 'RedshiftDatabasePassword' => ['type' => 'string', 'max' => 64, 'min' => 8], 'RedshiftDatabaseUsername' => ['type' => 'string', 'max' => 128, 'min' => 1], 'RedshiftMetadata' => ['type' => 'structure', 'members' => ['RedshiftDatabase' => ['shape' => 'RedshiftDatabase'], 'DatabaseUserName' => ['shape' => 'RedshiftDatabaseUsername'], 'SelectSqlQuery' => ['shape' => 'RedshiftSelectSqlQuery']]], 'RedshiftSelectSqlQuery' => ['type' => 'string', 'max' => 16777216, 'min' => 1], 'ResourceNotFoundException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage'], 'code' => ['shape' => 'ErrorCode']], 'exception' => \true], 'RoleARN' => ['type' => 'string', 'max' => 110, 'min' => 1], 'S3DataSpec' => ['type' => 'structure', 'required' => ['DataLocationS3'], 'members' => ['DataLocationS3' => ['shape' => 'S3Url'], 'DataRearrangement' => ['shape' => 'DataRearrangement'], 'DataSchema' => ['shape' => 'DataSchema'], 'DataSchemaLocationS3' => ['shape' => 'S3Url']]], 'S3Url' => ['type' => 'string', 'max' => 2048, 'pattern' => 's3://([^/]+)(/.*)?'], 'ScoreThreshold' => ['type' => 'float'], 'ScoreValue' => ['type' => 'float'], 'ScoreValuePerLabelMap' => ['type' => 'map', 'key' => ['shape' => 'Label'], 'value' => ['shape' => 'ScoreValue']], 'SortOrder' => ['type' => 'string', 'enum' => ['asc', 'dsc']], 'StringType' => ['type' => 'string'], 'Tag' => ['type' => 'structure', 'members' => ['Key' => ['shape' => 'TagKey'], 'Value' => ['shape' => 'TagValue']]], 'TagKey' => ['type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'TagKeyList' => ['type' => 'list', 'member' => ['shape' => 'TagKey'], 'max' => 100], 'TagLimitExceededException' => ['type' => 'structure', 'members' => ['message' => ['shape' => 'ErrorMessage']], 'exception' => \true], 'TagList' => ['type' => 'list', 'member' => ['shape' => 'Tag'], 'max' => 100], 'TagValue' => ['type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$'], 'TaggableResourceType' => ['type' => 'string', 'enum' => ['BatchPrediction', 'DataSource', 'Evaluation', 'MLModel']], 'TrainingParameters' => ['type' => 'map', 'key' => ['shape' => 'StringType'], 'value' => ['shape' => 'StringType']], 'UpdateBatchPredictionInput' => ['type' => 'structure', 'required' => ['BatchPredictionId', 'BatchPredictionName'], 'members' => ['BatchPredictionId' => ['shape' => 'EntityId'], 'BatchPredictionName' => ['shape' => 'EntityName']]], 'UpdateBatchPredictionOutput' => ['type' => 'structure', 'members' => ['BatchPredictionId' => ['shape' => 'EntityId']]], 'UpdateDataSourceInput' => ['type' => 'structure', 'required' => ['DataSourceId', 'DataSourceName'], 'members' => ['DataSourceId' => ['shape' => 'EntityId'], 'DataSourceName' => ['shape' => 'EntityName']]], 'UpdateDataSourceOutput' => ['type' => 'structure', 'members' => ['DataSourceId' => ['shape' => 'EntityId']]], 'UpdateEvaluationInput' => ['type' => 'structure', 'required' => ['EvaluationId', 'EvaluationName'], 'members' => ['EvaluationId' => ['shape' => 'EntityId'], 'EvaluationName' => ['shape' => 'EntityName']]], 'UpdateEvaluationOutput' => ['type' => 'structure', 'members' => ['EvaluationId' => ['shape' => 'EntityId']]], 'UpdateMLModelInput' => ['type' => 'structure', 'required' => ['MLModelId'], 'members' => ['MLModelId' => ['shape' => 'EntityId'], 'MLModelName' => ['shape' => 'EntityName'], 'ScoreThreshold' => ['shape' => 'ScoreThreshold']]], 'UpdateMLModelOutput' => ['type' => 'structure', 'members' => ['MLModelId' => ['shape' => 'EntityId']]], 'VariableName' => ['type' => 'string'], 'VariableValue' => ['type' => 'string'], 'Verbose' => ['type' => 'boolean'], 'VipURL' => ['type' => 'string', 'max' => 2048, 'pattern' => 'https://[a-zA-Z0-9-.]*\\.amazon(aws)?\\.com[/]?'], 'floatLabel' => ['type' => 'float']]];

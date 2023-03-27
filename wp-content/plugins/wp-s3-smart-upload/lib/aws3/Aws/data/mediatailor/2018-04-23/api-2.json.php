<?php

// This file was auto-generated from sdk-root/src/data/mediatailor/2018-04-23/api-2.json
return ['metadata' => ['apiVersion' => '2018-04-23', 'endpointPrefix' => 'api.mediatailor', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'MediaTailor', 'serviceFullName' => 'AWS MediaTailor', 'serviceId' => 'MediaTailor', 'signatureVersion' => 'v4', 'signingName' => 'mediatailor', 'uid' => 'mediatailor-2018-04-23'], 'operations' => ['CreateChannel' => ['errors' => [], 'http' => ['method' => 'POST', 'requestUri' => '/channel/{channelName}', 'responseCode' => 200], 'input' => ['shape' => 'CreateChannelRequest'], 'name' => 'CreateChannel', 'output' => ['shape' => 'CreateChannelResponse']], 'CreateProgram' => ['errors' => [], 'http' => ['method' => 'POST', 'requestUri' => '/channel/{channelName}/program/{programName}', 'responseCode' => 200], 'input' => ['shape' => 'CreateProgramRequest'], 'name' => 'CreateProgram', 'output' => ['shape' => 'CreateProgramResponse']], 'CreateSourceLocation' => ['errors' => [], 'http' => ['method' => 'POST', 'requestUri' => '/sourceLocation/{sourceLocationName}', 'responseCode' => 200], 'input' => ['shape' => 'CreateSourceLocationRequest'], 'name' => 'CreateSourceLocation', 'output' => ['shape' => 'CreateSourceLocationResponse']], 'CreateVodSource' => ['errors' => [], 'http' => ['method' => 'POST', 'requestUri' => '/sourceLocation/{sourceLocationName}/vodSource/{vodSourceName}', 'responseCode' => 200], 'input' => ['shape' => 'CreateVodSourceRequest'], 'name' => 'CreateVodSource', 'output' => ['shape' => 'CreateVodSourceResponse']], 'DeleteChannel' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/channel/{channelName}', 'responseCode' => 200], 'input' => ['shape' => 'DeleteChannelRequest'], 'name' => 'DeleteChannel', 'output' => ['shape' => 'DeleteChannelResponse']], 'DeleteChannelPolicy' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/channel/{channelName}/policy', 'responseCode' => 200], 'input' => ['shape' => 'DeleteChannelPolicyRequest'], 'name' => 'DeleteChannelPolicy', 'output' => ['shape' => 'DeleteChannelPolicyResponse']], 'DeletePlaybackConfiguration' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 204], 'input' => ['shape' => 'DeletePlaybackConfigurationRequest'], 'name' => 'DeletePlaybackConfiguration', 'output' => ['shape' => 'DeletePlaybackConfigurationResponse']], 'DeleteProgram' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/channel/{channelName}/program/{programName}', 'responseCode' => 200], 'input' => ['shape' => 'DeleteProgramRequest'], 'name' => 'DeleteProgram', 'output' => ['shape' => 'DeleteProgramResponse']], 'DeleteSourceLocation' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/sourceLocation/{sourceLocationName}', 'responseCode' => 200], 'input' => ['shape' => 'DeleteSourceLocationRequest'], 'name' => 'DeleteSourceLocation', 'output' => ['shape' => 'DeleteSourceLocationResponse']], 'DeleteVodSource' => ['errors' => [], 'http' => ['method' => 'DELETE', 'requestUri' => '/sourceLocation/{sourceLocationName}/vodSource/{vodSourceName}', 'responseCode' => 200], 'input' => ['shape' => 'DeleteVodSourceRequest'], 'name' => 'DeleteVodSource', 'output' => ['shape' => 'DeleteVodSourceResponse']], 'DescribeChannel' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/channel/{channelName}', 'responseCode' => 200], 'input' => ['shape' => 'DescribeChannelRequest'], 'name' => 'DescribeChannel', 'output' => ['shape' => 'DescribeChannelResponse']], 'DescribeProgram' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/channel/{channelName}/program/{programName}', 'responseCode' => 200], 'input' => ['shape' => 'DescribeProgramRequest'], 'name' => 'DescribeProgram', 'output' => ['shape' => 'DescribeProgramResponse']], 'DescribeSourceLocation' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/sourceLocation/{sourceLocationName}', 'responseCode' => 200], 'input' => ['shape' => 'DescribeSourceLocationRequest'], 'name' => 'DescribeSourceLocation', 'output' => ['shape' => 'DescribeSourceLocationResponse']], 'DescribeVodSource' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/sourceLocation/{sourceLocationName}/vodSource/{vodSourceName}', 'responseCode' => 200], 'input' => ['shape' => 'DescribeVodSourceRequest'], 'name' => 'DescribeVodSource', 'output' => ['shape' => 'DescribeVodSourceResponse']], 'GetChannelPolicy' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/channel/{channelName}/policy', 'responseCode' => 200], 'input' => ['shape' => 'GetChannelPolicyRequest'], 'name' => 'GetChannelPolicy', 'output' => ['shape' => 'GetChannelPolicyResponse']], 'GetChannelSchedule' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/channel/{channelName}/schedule', 'responseCode' => 200], 'input' => ['shape' => 'GetChannelScheduleRequest'], 'name' => 'GetChannelSchedule', 'output' => ['shape' => 'GetChannelScheduleResponse']], 'GetPlaybackConfiguration' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 200], 'input' => ['shape' => 'GetPlaybackConfigurationRequest'], 'name' => 'GetPlaybackConfiguration', 'output' => ['shape' => 'GetPlaybackConfigurationResponse']], 'ListChannels' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/channels', 'responseCode' => 200], 'input' => ['shape' => 'ListChannelsRequest'], 'name' => 'ListChannels', 'output' => ['shape' => 'ListChannelsResponse']], 'ListPlaybackConfigurations' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/playbackConfigurations', 'responseCode' => 200], 'input' => ['shape' => 'ListPlaybackConfigurationsRequest'], 'name' => 'ListPlaybackConfigurations', 'output' => ['shape' => 'ListPlaybackConfigurationsResponse']], 'ListSourceLocations' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/sourceLocations', 'responseCode' => 200], 'input' => ['shape' => 'ListSourceLocationsRequest'], 'name' => 'ListSourceLocations', 'output' => ['shape' => 'ListSourceLocationsResponse']], 'ListTagsForResource' => ['errors' => [['shape' => 'BadRequestException']], 'http' => ['method' => 'GET', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 200], 'input' => ['shape' => 'ListTagsForResourceRequest'], 'name' => 'ListTagsForResource', 'output' => ['shape' => 'ListTagsForResourceResponse']], 'ListVodSources' => ['errors' => [], 'http' => ['method' => 'GET', 'requestUri' => '/sourceLocation/{sourceLocationName}/vodSources', 'responseCode' => 200], 'input' => ['shape' => 'ListVodSourcesRequest'], 'name' => 'ListVodSources', 'output' => ['shape' => 'ListVodSourcesResponse']], 'PutChannelPolicy' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/channel/{channelName}/policy', 'responseCode' => 200], 'input' => ['shape' => 'PutChannelPolicyRequest'], 'name' => 'PutChannelPolicy', 'output' => ['shape' => 'PutChannelPolicyResponse']], 'PutPlaybackConfiguration' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/playbackConfiguration', 'responseCode' => 200], 'input' => ['shape' => 'PutPlaybackConfigurationRequest'], 'name' => 'PutPlaybackConfiguration', 'output' => ['shape' => 'PutPlaybackConfigurationResponse']], 'StartChannel' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/channel/{channelName}/start', 'responseCode' => 200], 'input' => ['shape' => 'StartChannelRequest'], 'name' => 'StartChannel', 'output' => ['shape' => 'StartChannelResponse']], 'StopChannel' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/channel/{channelName}/stop', 'responseCode' => 200], 'input' => ['shape' => 'StopChannelRequest'], 'name' => 'StopChannel', 'output' => ['shape' => 'StopChannelResponse']], 'TagResource' => ['errors' => [['shape' => 'BadRequestException']], 'http' => ['method' => 'POST', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 204], 'input' => ['shape' => 'TagResourceRequest'], 'name' => 'TagResource'], 'UntagResource' => ['errors' => [['shape' => 'BadRequestException']], 'http' => ['method' => 'DELETE', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 204], 'input' => ['shape' => 'UntagResourceRequest'], 'name' => 'UntagResource'], 'UpdateChannel' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/channel/{channelName}', 'responseCode' => 200], 'input' => ['shape' => 'UpdateChannelRequest'], 'name' => 'UpdateChannel', 'output' => ['shape' => 'UpdateChannelResponse']], 'UpdateSourceLocation' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/sourceLocation/{sourceLocationName}', 'responseCode' => 200], 'input' => ['shape' => 'UpdateSourceLocationRequest'], 'name' => 'UpdateSourceLocation', 'output' => ['shape' => 'UpdateSourceLocationResponse']], 'UpdateVodSource' => ['errors' => [], 'http' => ['method' => 'PUT', 'requestUri' => '/sourceLocation/{sourceLocationName}/vodSource/{vodSourceName}', 'responseCode' => 200], 'input' => ['shape' => 'UpdateVodSourceRequest'], 'name' => 'UpdateVodSource', 'output' => ['shape' => 'UpdateVodSourceResponse']]], 'shapes' => ['AccessConfiguration' => ['members' => ['AccessType' => ['shape' => 'AccessType']], 'type' => 'structure'], 'AccessType' => ['enum' => ['S3_SIGV4'], 'type' => 'string'], 'AdBreak' => ['members' => ['MessageType' => ['shape' => 'MessageType'], 'OffsetMillis' => ['shape' => '__long'], 'Slate' => ['shape' => 'SlateSource'], 'SpliceInsertMessage' => ['shape' => 'SpliceInsertMessage']], 'type' => 'structure'], 'AdMarkerPassthrough' => ['members' => ['Enabled' => ['shape' => '__boolean']], 'type' => 'structure'], 'AvailSuppression' => ['members' => ['Mode' => ['shape' => 'Mode'], 'Value' => ['shape' => '__string']], 'type' => 'structure'], 'BadRequestException' => ['error' => ['httpStatusCode' => 400], 'exception' => \true, 'members' => ['Message' => ['shape' => '__string']], 'type' => 'structure'], 'Bumper' => ['members' => ['EndUrl' => ['shape' => '__string'], 'StartUrl' => ['shape' => '__string']], 'type' => 'structure'], 'CdnConfiguration' => ['members' => ['AdSegmentUrlPrefix' => ['shape' => '__string'], 'ContentSegmentUrlPrefix' => ['shape' => '__string']], 'type' => 'structure'], 'Channel' => ['members' => ['Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'ChannelState' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'Outputs' => ['shape' => 'ResponseOutputs'], 'PlaybackMode' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'required' => ['ChannelState', 'ChannelName', 'Outputs', 'Arn', 'PlaybackMode'], 'type' => 'structure'], 'ChannelState' => ['enum' => ['RUNNING', 'STOPPED'], 'type' => 'string'], 'ConfigurationAliasesRequest' => ['key' => ['shape' => '__string'], 'type' => 'map', 'value' => ['shape' => '__mapOf__string']], 'ConfigurationAliasesResponse' => ['key' => ['shape' => '__string'], 'type' => 'map', 'value' => ['shape' => '__mapOf__string']], 'CreateChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'Outputs' => ['shape' => 'RequestOutputs'], 'PlaybackMode' => ['shape' => 'PlaybackMode'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'required' => ['ChannelName', 'Outputs', 'PlaybackMode'], 'type' => 'structure'], 'CreateChannelResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'ChannelState' => ['shape' => 'ChannelState'], 'CreationTime' => ['shape' => '__timestampUnix'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'Outputs' => ['shape' => 'ResponseOutputs'], 'PlaybackMode' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'CreateProgramRequest' => ['members' => ['AdBreaks' => ['shape' => '__listOfAdBreak'], 'ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'ProgramName' => ['location' => 'uri', 'locationName' => 'programName', 'shape' => '__string'], 'ScheduleConfiguration' => ['shape' => 'ScheduleConfiguration'], 'SourceLocationName' => ['shape' => '__string'], 'VodSourceName' => ['shape' => '__string']], 'required' => ['ChannelName', 'ProgramName', 'VodSourceName', 'ScheduleConfiguration', 'SourceLocationName'], 'type' => 'structure'], 'CreateProgramResponse' => ['members' => ['AdBreaks' => ['shape' => '__listOfAdBreak'], 'Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'ProgramName' => ['shape' => '__string'], 'SourceLocationName' => ['shape' => '__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'CreateSourceLocationRequest' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'required' => ['SourceLocationName', 'HttpConfiguration'], 'type' => 'structure'], 'CreateSourceLocationResponse' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'CreateVodSourceRequest' => ['members' => ['HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'VodSourceName' => ['location' => 'uri', 'locationName' => 'vodSourceName', 'shape' => '__string']], 'required' => ['SourceLocationName', 'VodSourceName', 'HttpPackageConfigurations'], 'type' => 'structure'], 'CreateVodSourceResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'DashConfiguration' => ['members' => ['ManifestEndpointPrefix' => ['shape' => '__string'], 'MpdLocation' => ['shape' => '__string'], 'OriginManifestType' => ['shape' => 'OriginManifestType']], 'type' => 'structure'], 'DashConfigurationForPut' => ['members' => ['MpdLocation' => ['shape' => '__string'], 'OriginManifestType' => ['shape' => 'OriginManifestType']], 'type' => 'structure'], 'DashPlaylistSettings' => ['members' => ['ManifestWindowSeconds' => ['shape' => '__integer'], 'MinBufferTimeSeconds' => ['shape' => '__integer'], 'MinUpdatePeriodSeconds' => ['shape' => '__integer'], 'SuggestedPresentationDelaySeconds' => ['shape' => '__integer']], 'type' => 'structure'], 'DefaultSegmentDeliveryConfiguration' => ['members' => ['BaseUrl' => ['shape' => '__string']], 'type' => 'structure'], 'DeleteChannelPolicyRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'DeleteChannelPolicyResponse' => ['members' => [], 'type' => 'structure'], 'DeleteChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'DeleteChannelResponse' => ['members' => [], 'type' => 'structure'], 'DeletePlaybackConfigurationRequest' => ['members' => ['Name' => ['location' => 'uri', 'locationName' => 'Name', 'shape' => '__string']], 'required' => ['Name'], 'type' => 'structure'], 'DeletePlaybackConfigurationResponse' => ['members' => [], 'type' => 'structure'], 'DeleteProgramRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'ProgramName' => ['location' => 'uri', 'locationName' => 'programName', 'shape' => '__string']], 'required' => ['ChannelName', 'ProgramName'], 'type' => 'structure'], 'DeleteProgramResponse' => ['members' => [], 'type' => 'structure'], 'DeleteSourceLocationRequest' => ['members' => ['SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string']], 'required' => ['SourceLocationName'], 'type' => 'structure'], 'DeleteSourceLocationResponse' => ['members' => [], 'type' => 'structure'], 'DeleteVodSourceRequest' => ['members' => ['SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string'], 'VodSourceName' => ['location' => 'uri', 'locationName' => 'vodSourceName', 'shape' => '__string']], 'required' => ['SourceLocationName', 'VodSourceName'], 'type' => 'structure'], 'DeleteVodSourceResponse' => ['members' => [], 'type' => 'structure'], 'DescribeChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'DescribeChannelResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'ChannelState' => ['shape' => 'ChannelState'], 'CreationTime' => ['shape' => '__timestampUnix'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'Outputs' => ['shape' => 'ResponseOutputs'], 'PlaybackMode' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'DescribeProgramRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'ProgramName' => ['location' => 'uri', 'locationName' => 'programName', 'shape' => '__string']], 'required' => ['ChannelName', 'ProgramName'], 'type' => 'structure'], 'DescribeProgramResponse' => ['members' => ['AdBreaks' => ['shape' => '__listOfAdBreak'], 'Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'ProgramName' => ['shape' => '__string'], 'SourceLocationName' => ['shape' => '__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'DescribeSourceLocationRequest' => ['members' => ['SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string']], 'required' => ['SourceLocationName'], 'type' => 'structure'], 'DescribeSourceLocationResponse' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'DescribeVodSourceRequest' => ['members' => ['SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string'], 'VodSourceName' => ['location' => 'uri', 'locationName' => 'vodSourceName', 'shape' => '__string']], 'required' => ['SourceLocationName', 'VodSourceName'], 'type' => 'structure'], 'DescribeVodSourceResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'GetChannelPolicyRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'GetChannelPolicyResponse' => ['members' => ['Policy' => ['shape' => '__string']], 'type' => 'structure'], 'GetChannelScheduleRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'DurationMinutes' => ['location' => 'querystring', 'locationName' => 'durationMinutes', 'shape' => '__string'], 'MaxResults' => ['location' => 'querystring', 'locationName' => 'maxResults', 'shape' => 'MaxResults'], 'NextToken' => ['location' => 'querystring', 'locationName' => 'nextToken', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'GetChannelScheduleResponse' => ['members' => ['Items' => ['shape' => '__listOfScheduleEntry'], 'NextToken' => ['shape' => '__string']], 'type' => 'structure'], 'GetPlaybackConfigurationRequest' => ['members' => ['Name' => ['location' => 'uri', 'locationName' => 'Name', 'shape' => '__string']], 'required' => ['Name'], 'type' => 'structure'], 'GetPlaybackConfigurationResponse' => ['members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'AvailSuppression' => ['shape' => 'AvailSuppression'], 'Bumper' => ['shape' => 'Bumper'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'ConfigurationAliases' => ['shape' => 'ConfigurationAliasesResponse'], 'DashConfiguration' => ['shape' => 'DashConfiguration'], 'HlsConfiguration' => ['shape' => 'HlsConfiguration'], 'LivePreRollConfiguration' => ['shape' => 'LivePreRollConfiguration'], 'ManifestProcessingRules' => ['shape' => 'ManifestProcessingRules'], 'Name' => ['shape' => '__string'], 'PersonalizationThresholdSeconds' => ['shape' => '__integerMin1'], 'PlaybackConfigurationArn' => ['shape' => '__string'], 'PlaybackEndpointPrefix' => ['shape' => '__string'], 'SessionInitializationEndpointPrefix' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']], 'type' => 'structure'], 'HlsConfiguration' => ['members' => ['ManifestEndpointPrefix' => ['shape' => '__string']], 'type' => 'structure'], 'HlsPlaylistSettings' => ['members' => ['ManifestWindowSeconds' => ['shape' => '__integer']], 'type' => 'structure'], 'HttpConfiguration' => ['members' => ['BaseUrl' => ['shape' => '__string']], 'required' => ['BaseUrl'], 'type' => 'structure'], 'HttpPackageConfiguration' => ['members' => ['Path' => ['shape' => '__string'], 'SourceGroup' => ['shape' => '__string'], 'Type' => ['shape' => 'Type']], 'required' => ['Path', 'Type', 'SourceGroup'], 'type' => 'structure'], 'HttpPackageConfigurations' => ['member' => ['shape' => 'HttpPackageConfiguration'], 'type' => 'list'], 'ListChannelsRequest' => ['members' => ['MaxResults' => ['location' => 'querystring', 'locationName' => 'maxResults', 'shape' => 'MaxResults'], 'NextToken' => ['location' => 'querystring', 'locationName' => 'nextToken', 'shape' => '__string']], 'type' => 'structure'], 'ListChannelsResponse' => ['members' => ['Items' => ['shape' => '__listOfChannel'], 'NextToken' => ['shape' => '__string']], 'type' => 'structure'], 'ListPlaybackConfigurationsRequest' => ['members' => ['MaxResults' => ['location' => 'querystring', 'locationName' => 'MaxResults', 'shape' => 'MaxResults'], 'NextToken' => ['location' => 'querystring', 'locationName' => 'NextToken', 'shape' => '__string']], 'type' => 'structure'], 'ListPlaybackConfigurationsResponse' => ['members' => ['Items' => ['shape' => '__listOfPlaybackConfiguration'], 'NextToken' => ['shape' => '__string']], 'type' => 'structure'], 'ListSourceLocationsRequest' => ['members' => ['MaxResults' => ['location' => 'querystring', 'locationName' => 'maxResults', 'shape' => 'MaxResults'], 'NextToken' => ['location' => 'querystring', 'locationName' => 'nextToken', 'shape' => '__string']], 'type' => 'structure'], 'ListSourceLocationsResponse' => ['members' => ['Items' => ['shape' => '__listOfSourceLocation'], 'NextToken' => ['shape' => '__string']], 'type' => 'structure'], 'ListTagsForResourceRequest' => ['members' => ['ResourceArn' => ['location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string']], 'required' => ['ResourceArn'], 'type' => 'structure'], 'ListTagsForResourceResponse' => ['members' => ['Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'ListVodSourcesRequest' => ['members' => ['MaxResults' => ['location' => 'querystring', 'locationName' => 'maxResults', 'shape' => 'MaxResults'], 'NextToken' => ['location' => 'querystring', 'locationName' => 'nextToken', 'shape' => '__string'], 'SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string']], 'required' => ['SourceLocationName'], 'type' => 'structure'], 'ListVodSourcesResponse' => ['members' => ['Items' => ['shape' => '__listOfVodSource'], 'NextToken' => ['shape' => '__string']], 'type' => 'structure'], 'LivePreRollConfiguration' => ['members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'MaxDurationSeconds' => ['shape' => '__integer']], 'type' => 'structure'], 'ManifestProcessingRules' => ['members' => ['AdMarkerPassthrough' => ['shape' => 'AdMarkerPassthrough']], 'type' => 'structure'], 'MaxResults' => ['max' => 100, 'min' => 1, 'type' => 'integer'], 'MessageType' => ['enum' => ['SPLICE_INSERT'], 'type' => 'string'], 'Mode' => ['enum' => ['OFF', 'BEHIND_LIVE_EDGE'], 'type' => 'string'], 'OriginManifestType' => ['enum' => ['SINGLE_PERIOD', 'MULTI_PERIOD'], 'type' => 'string'], 'PlaybackConfiguration' => ['members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'AvailSuppression' => ['shape' => 'AvailSuppression'], 'Bumper' => ['shape' => 'Bumper'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'ConfigurationAliases' => ['shape' => 'ConfigurationAliasesResponse'], 'DashConfiguration' => ['shape' => 'DashConfiguration'], 'HlsConfiguration' => ['shape' => 'HlsConfiguration'], 'LivePreRollConfiguration' => ['shape' => 'LivePreRollConfiguration'], 'ManifestProcessingRules' => ['shape' => 'ManifestProcessingRules'], 'Name' => ['shape' => '__string'], 'PersonalizationThresholdSeconds' => ['shape' => '__integerMin1'], 'PlaybackConfigurationArn' => ['shape' => '__string'], 'PlaybackEndpointPrefix' => ['shape' => '__string'], 'SessionInitializationEndpointPrefix' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']], 'type' => 'structure'], 'PlaybackMode' => ['enum' => ['LOOP'], 'type' => 'string'], 'PutChannelPolicyRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'Policy' => ['shape' => '__string']], 'required' => ['ChannelName', 'Policy'], 'type' => 'structure'], 'PutChannelPolicyResponse' => ['members' => [], 'type' => 'structure'], 'PutPlaybackConfigurationRequest' => ['members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'AvailSuppression' => ['shape' => 'AvailSuppression'], 'Bumper' => ['shape' => 'Bumper'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'ConfigurationAliases' => ['shape' => 'ConfigurationAliasesRequest'], 'DashConfiguration' => ['shape' => 'DashConfigurationForPut'], 'LivePreRollConfiguration' => ['shape' => 'LivePreRollConfiguration'], 'ManifestProcessingRules' => ['shape' => 'ManifestProcessingRules'], 'Name' => ['shape' => '__string'], 'PersonalizationThresholdSeconds' => ['shape' => '__integerMin1'], 'SlateAdUrl' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']], 'type' => 'structure'], 'PutPlaybackConfigurationResponse' => ['members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'AvailSuppression' => ['shape' => 'AvailSuppression'], 'Bumper' => ['shape' => 'Bumper'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'ConfigurationAliases' => ['shape' => 'ConfigurationAliasesResponse'], 'DashConfiguration' => ['shape' => 'DashConfiguration'], 'HlsConfiguration' => ['shape' => 'HlsConfiguration'], 'LivePreRollConfiguration' => ['shape' => 'LivePreRollConfiguration'], 'ManifestProcessingRules' => ['shape' => 'ManifestProcessingRules'], 'Name' => ['shape' => '__string'], 'PersonalizationThresholdSeconds' => ['shape' => '__integerMin1'], 'PlaybackConfigurationArn' => ['shape' => '__string'], 'PlaybackEndpointPrefix' => ['shape' => '__string'], 'SessionInitializationEndpointPrefix' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']], 'type' => 'structure'], 'RelativePosition' => ['enum' => ['BEFORE_PROGRAM', 'AFTER_PROGRAM'], 'type' => 'string'], 'RequestOutputItem' => ['members' => ['DashPlaylistSettings' => ['shape' => 'DashPlaylistSettings'], 'HlsPlaylistSettings' => ['shape' => 'HlsPlaylistSettings'], 'ManifestName' => ['shape' => '__string'], 'SourceGroup' => ['shape' => '__string']], 'required' => ['ManifestName', 'SourceGroup'], 'type' => 'structure'], 'RequestOutputs' => ['member' => ['shape' => 'RequestOutputItem'], 'type' => 'list'], 'ResponseOutputItem' => ['members' => ['DashPlaylistSettings' => ['shape' => 'DashPlaylistSettings'], 'HlsPlaylistSettings' => ['shape' => 'HlsPlaylistSettings'], 'ManifestName' => ['shape' => '__string'], 'PlaybackUrl' => ['shape' => '__string'], 'SourceGroup' => ['shape' => '__string']], 'required' => ['ManifestName', 'PlaybackUrl', 'SourceGroup'], 'type' => 'structure'], 'ResponseOutputs' => ['member' => ['shape' => 'ResponseOutputItem'], 'type' => 'list'], 'ScheduleConfiguration' => ['members' => ['Transition' => ['shape' => 'Transition']], 'required' => ['Transition'], 'type' => 'structure'], 'ScheduleEntry' => ['members' => ['ApproximateDurationSeconds' => ['shape' => '__long'], 'ApproximateStartTime' => ['shape' => '__timestampUnix'], 'Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'ProgramName' => ['shape' => '__string'], 'SourceLocationName' => ['shape' => '__string'], 'VodSourceName' => ['shape' => '__string']], 'required' => ['VodSourceName', 'ChannelName', 'SourceLocationName', 'Arn', 'ProgramName'], 'type' => 'structure'], 'SlateSource' => ['members' => ['SourceLocationName' => ['shape' => '__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'SourceLocation' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'required' => ['SourceLocationName', 'HttpConfiguration', 'Arn'], 'type' => 'structure'], 'SpliceInsertMessage' => ['members' => ['AvailNum' => ['shape' => '__integer'], 'AvailsExpected' => ['shape' => '__integer'], 'SpliceEventId' => ['shape' => '__integer'], 'UniqueProgramId' => ['shape' => '__integer']], 'type' => 'structure'], 'StartChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'StartChannelResponse' => ['members' => [], 'type' => 'structure'], 'StopChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string']], 'required' => ['ChannelName'], 'type' => 'structure'], 'StopChannelResponse' => ['members' => [], 'type' => 'structure'], 'TagResourceRequest' => ['members' => ['ResourceArn' => ['location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'required' => ['ResourceArn', 'Tags'], 'type' => 'structure'], 'Transition' => ['members' => ['RelativePosition' => ['shape' => 'RelativePosition'], 'RelativeProgram' => ['shape' => '__string'], 'Type' => ['shape' => '__string']], 'required' => ['Type', 'RelativePosition'], 'type' => 'structure'], 'Type' => ['enum' => ['DASH', 'HLS'], 'type' => 'string'], 'UntagResourceRequest' => ['members' => ['ResourceArn' => ['location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string'], 'TagKeys' => ['location' => 'querystring', 'locationName' => 'tagKeys', 'shape' => '__listOf__string']], 'required' => ['ResourceArn', 'TagKeys'], 'type' => 'structure'], 'UpdateChannelRequest' => ['members' => ['ChannelName' => ['location' => 'uri', 'locationName' => 'channelName', 'shape' => '__string'], 'Outputs' => ['shape' => 'RequestOutputs']], 'required' => ['ChannelName', 'Outputs'], 'type' => 'structure'], 'UpdateChannelResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'ChannelName' => ['shape' => '__string'], 'ChannelState' => ['shape' => 'ChannelState'], 'CreationTime' => ['shape' => '__timestampUnix'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'Outputs' => ['shape' => 'ResponseOutputs'], 'PlaybackMode' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'UpdateSourceLocationRequest' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string']], 'required' => ['SourceLocationName', 'HttpConfiguration'], 'type' => 'structure'], 'UpdateSourceLocationResponse' => ['members' => ['AccessConfiguration' => ['shape' => 'AccessConfiguration'], 'Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'DefaultSegmentDeliveryConfiguration' => ['shape' => 'DefaultSegmentDeliveryConfiguration'], 'HttpConfiguration' => ['shape' => 'HttpConfiguration'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string']], 'type' => 'structure'], 'UpdateVodSourceRequest' => ['members' => ['HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'SourceLocationName' => ['location' => 'uri', 'locationName' => 'sourceLocationName', 'shape' => '__string'], 'VodSourceName' => ['location' => 'uri', 'locationName' => 'vodSourceName', 'shape' => '__string']], 'required' => ['SourceLocationName', 'VodSourceName', 'HttpPackageConfigurations'], 'type' => 'structure'], 'UpdateVodSourceResponse' => ['members' => ['Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'VodSourceName' => ['shape' => '__string']], 'type' => 'structure'], 'VodSource' => ['members' => ['Arn' => ['shape' => '__string'], 'CreationTime' => ['shape' => '__timestampUnix'], 'HttpPackageConfigurations' => ['shape' => 'HttpPackageConfigurations'], 'LastModifiedTime' => ['shape' => '__timestampUnix'], 'SourceLocationName' => ['shape' => '__string'], 'Tags' => ['locationName' => 'tags', 'shape' => '__mapOf__string'], 'VodSourceName' => ['shape' => '__string']], 'required' => ['VodSourceName', 'SourceLocationName', 'HttpPackageConfigurations', 'Arn'], 'type' => 'structure'], '__boolean' => ['type' => 'boolean'], '__integer' => ['type' => 'integer'], '__integerMin1' => ['min' => 1, 'type' => 'integer'], '__listOfAdBreak' => ['member' => ['shape' => 'AdBreak'], 'type' => 'list'], '__listOfChannel' => ['member' => ['shape' => 'Channel'], 'type' => 'list'], '__listOfPlaybackConfiguration' => ['member' => ['shape' => 'PlaybackConfiguration'], 'type' => 'list'], '__listOfScheduleEntry' => ['member' => ['shape' => 'ScheduleEntry'], 'type' => 'list'], '__listOfSourceLocation' => ['member' => ['shape' => 'SourceLocation'], 'type' => 'list'], '__listOfVodSource' => ['member' => ['shape' => 'VodSource'], 'type' => 'list'], '__listOf__string' => ['member' => ['shape' => '__string'], 'type' => 'list'], '__long' => ['type' => 'long'], '__mapOf__string' => ['key' => ['shape' => '__string'], 'type' => 'map', 'value' => ['shape' => '__string']], '__string' => ['type' => 'string'], '__timestampUnix' => ['timestampFormat' => 'unixTimestamp', 'type' => 'timestamp']]];

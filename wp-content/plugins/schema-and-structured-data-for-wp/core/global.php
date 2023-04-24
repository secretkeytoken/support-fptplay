<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$saswp_divi_faq = array();
$with_aggregate = array(
        'Car',
        'Vehicle',
        'Book',                     
        'Course',                                         
        'HowTo',                    
        'ImageObject',              
        'MusicPlaylist',            
        'MusicAlbum',               
        'MusicComposition',         
        'Movie',                                                    
        'Review',                   
        'Recipe',                   
        'TVSeries',
        'CreativeWorkSeries', 
        'SoftwareApplication',
        'MobileApplication',                                                                  
        'Event',                    
        'VideoGame',                
        'AudioObject',              
        'VideoObject',              
        'local_business',
        'Organization', 
        'project', 
        'Service',                 
        'Product'              
);
$without_aggregate = array(
        'Apartment',
        'HotelRoom',
        'Audiobook',
        'PodcastEpisode',
        'PodcastSeason', 
        'EducationalOccupationalCredential',
        'ApartmentComplex',
        'RealEstateListing',
        'House',
        'SingleFamilyResidence',
        'Article',
        'ScholarlyArticle',
        'CreativeWork',
        'VisualArtwork',
        'BlogPosting',
        'Blogposting',
        'DiscussionForumPosting',
        'DataFeed',
        'FAQ',
        'Photograph',
        'NewsArticle',
        'AnalysisNewsArticle',
        'AskPublicNewsArticle',
        'BackgroundNewsArticle',
        'OpinionNewsArticle',
        'ReportageNewsArticle',
        'ReviewNewsArticle',
        'qanda',        
        'TechArticle',
        'WebPage',
        'ItemPage',
        'JobPosting',
        'TaxiService',
        'Trip',
        'BoatTrip',
        'MedicalCondition',
        'TouristAttraction',
        'TouristDestination',
        'LandmarksOrHistoricalBuildings',
        'EducationalOccupationalProgram',
        'PsychologicalTreatment',
        'RentAction',
        'HinduTemple',
        'BuddhistTemple',
        'Church',
        'Mosque',
        'Person',
        'SpecialAnnouncement'
);
$translation_labels = array(
    'translation-pros'            => 'Pros',
    'translation-cons'            => 'Cons',
    'translation-review-overview' => 'Review Overview',
    'translation-overall-score'   => 'Overall Score',
    'translation-tools'           => 'Tools',
    'translation-materials'       => 'Materials',
    'translation-time-needed'     => 'Time Needed',
    'translation-estimate-cost'   => 'Estimate Cost',
    'translation-name'            => 'Name',
    'translation-comment'         => 'Comment',
    'translation-review-form'     => 'Review Form',
    'translation-based-on'        => 'Based On',
    'translation-reviews'         => 'Reviews',
    'translation-self'            => 'Self',
    'translation-summary'         => 'SUMMARY',
);          
$saswp_post_reviews = array();
$saswp_elementor_faq = array();
$saswp_wisdom;
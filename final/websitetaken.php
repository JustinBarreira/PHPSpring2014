<?php include 'dependency.php'; ?>
<?php

$websiteRequest = new WebsiteModel();
$websiteRequest->setWebsite(filter_input(INPUT_POST, 'website'));
        
$checkWebsite = array( "taken" => 'Available', "website" => $websiteRequest->getWebsite() );

$users = new Users();

if ( $users->websiteTaken($websiteRequest) )
{
    $checkWebsite["taken"] = 'Unavailable';
}

echo json_encode($checkWebsite);

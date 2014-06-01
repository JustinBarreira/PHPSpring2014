<?php include 'dependency.php'; ?>
<?php

$websiteRequest = new UsersModel();
$websiteRequest->setWebsite(filter_input(INPUT_POST, 'website'));
        
$checkWebsite = array( "taken" => 'Available', "website" => $websiteRequest->getWebsite() );

$signup = new Signup();

if ( Validator::websiteTaken($websiteRequest) )
{
    $checkWebsite["taken"] = 'Unavailable';
}

echo json_encode($checkWebsite);

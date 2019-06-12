<?php
include_once("flipkartApiClass.php");

// Get affiliateID and token from https://affiliate.flipkart.com/
// Set flipkart affiliateID and token
$affiliateID = 'sushanthu';
$token = 'd2fb0da1e6074e93aa1e918eac3343f0';
$fkObj = new flipkartApi($affiliateID, $token);

// fetch flipkart offer
$offerJsonURL =  'https://affiliate-api.flipkart.net/affiliate/offers/v1/all/json';
$dotdJsonURL =  'https://affiliate-api.flipkart.net/affiliate/offers/v1/dotd/json';

$result = flipkartApi::getData($offerJsonURL, 'json');
if(!$result) {
    	echo "<h3>There is no offer</h3>";
    }
?>
<title>FlipKart Offers</title>
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        

<div class="container section">
<h1 style="text-align:center">FlipKart Offers</h1>
<div class="row">
    <?php foreach($result['allOffersList'] as $resultSet) { 
  

?>
<div class="row">
    <div class="col s3 m3 3">
      <div class="card" style="width: 15rem;">
      <div class="card-image waves-effect waves-block waves-light">
      <!-- <a href="<?= $resultSet['url']; ?>"><?= $resultSet['category']; ?>( Deal Of The Day )</a> -->
        <div class="card-image">
        <a  rel="nofollow, noindex" href="<?= $resultSet['url']; ?>"><img src="<?= $resultSet['imageUrls'][1]['url']; ?>" class="card-image waves-effect waves-block waves-light"/></a>
          <span class="card-title"><?= $resultSet['title']; ?></span>
        </div>
        <div class="card-content">
          <p><?= str_replace('_', ' ',$resultSet['category']); ?></p>
          <p><?= $resultSet['description']; ?></p>
        </div>
        <div class="card-action">
        <a rel="nofollow, noindex" href="<?= $resultSet['url']; ?>" class="btn btn-primary">Buy</a>
        </div>
      </div>
    </div>
  </div>
      
<?php   } ?>
</div>
</div>

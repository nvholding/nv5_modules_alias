<!-- BEGIN: main -->

<!-- BEGIN: rate -->
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "Thing",
    "name": "{data.ratename}"
  },
  "author": {
    "@type": "Person",
    "name": "{data.ratename}"
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "{data.ratenumber}",
    "bestRating": "10"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Washington Times"
  }
}
</script>
<!-- END: rate -->
<div class="page panel panel-default">
    <div class="panel-body">
<!-- BEGIN: tag -->
<h1 class="title margin-bottom-lg">{data.title}</h1>
<div class="des_alias">{data.description}</div>
<div class="detail_alias">{data.bodytext}</div>
<!-- END: tag -->
</div>
</div>

    <div class="panel-body">        
        <div id="search_result">
        	{SEARCH_RESULT}
        </div>
    </div>


<!-- END: main -->

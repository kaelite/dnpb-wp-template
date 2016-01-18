<?php
/*
 * Template Name: GA Statistics Page 
 * */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
<?  get_template_part('blocks/contentmode'); ?>
<section class="dnpb_block">

<script>

gapi.analytics.ready(function() {

	console.log("gapi ready");
  /**
   * Authorize the user with an access token obtained server side.
   */
  gapi.analytics.auth.authorize({
    'serverAuth': {
		'access_token': '<? include(TEMPLATEPATH."/google/getkey.php"); ?>'
    }
  });


  /**
   * Creates a new DataChart instance showing sessions over the past 30 days.
   * It will be rendered inside an element with the id "chart-1-container".
   */
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'metrics': 'ga:sessions,ga:users',
      'dimensions': 'ga:date'
    },
    chart: {
      'container': 'chart-1-container',
      'type': 'LINE',
      'options': {
        'width': '100%'
      }
    }
  });
  dataChart1.execute();


  /**
   * Creates a new DataChart instance showing top 5 most popular demos/tools
   * amongst returning users only.
   * It will be rendered inside an element with the id "chart-3-container".
   */
  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:pagePathLevel2',
      'sort': '-ga:pageviews',
      'filters': 'ga:pagePathLevel1!=/',
      'max-results': 7
    },
    chart: {
      'container': 'chart-2-container',
      'type': 'PIE',
      'options': {
        'width': '100%',
        'pieHole': 4/9,
      }
    }
  });
  dataChart2.execute();

  var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:country',
      'sort': '-ga:pageviews',
      'max-results': 7
    },
    chart: {
      'container': 'chart-3-container',
      'type': 'PIE',
      'options': {
        'width': '100%',
        'pieHole': 4/9,
      }
    }
  });
  dataChart3.execute();


  var dataChartTable = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:pagePath',
      'sort': '-ga:pageviews',
      'filters': 'ga:pagePathLevel1!=/',
      'max-results': 25
    },
    chart: {
      'container': 'chart-table-container',
      'type': 'TABLE',
      'options': {
        'width': '100%',
        'pieHole': 4/9,
      }
    }
  });
  dataChartTable.execute();
});
</script>

<div class="row">
	<div class="col-md-12">
		<h3><? the_title(); ?></h3>

		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
					<header class="titles">
						<h3 class="titles-main">Site Traffic</h3>
						<div class="titles-sub">Sessions vs. Users - last 30 days</div>
					</header>

					<div id="chart-1-container"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">Most Popular Pages</h3>
					<div class="titles-sub">Pageviews - last 30 days</div>
				</header>
					<div id="chart-2-container"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">By Visitors Country</h3>
					<div class="titles-sub">last 30 days</div>
				</header>
					<div id="chart-3-container"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">Most Popular Pages</h3>
					<div class="titles-sub">last 30 days</div>
				</header>
					<div id="chart-table-container"></div>
				</div>
			</div>
		</div>

	</div>
</div>
<div style="float:right; margin:0 0 5px; 10px;">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail('medium');
} 
?>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? the_content() ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<br/>

</section>
		</div>
	</div>
</div>
<?php get_footer(); ?>

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
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>

<!-- Include the DateRangeSelector component script. -->
<script src="<?=get_template_directory_uri();?>/assets/js/gapi/date-range-selector.js"></script>
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

 var dateRange = {
    'start-date': '30daysAgo',
    'end-date': 'yesterday'
  };


var dateRangeSelector = new gapi.analytics.ext.DateRangeSelector({
    container: 'date-range-container'
  })
  .set(dateRange)
  .execute();

 dateRangeSelector.on('change', function(data) {
	dataChart1.set({query: data}).execute();
	dataChart2.set({query: data}).execute();
	dataChart3.set({query: data}).execute();
	dataChartTable.set({query: data}).execute();
	dataChart1Table.set({query: data}).execute();
    dataChartCountriesTable.set({query:data}).execute();
    dataChartReferers.set({query:data}).execute();
	console.log(data);
});

  /**
   * Creates a new DataChart instance showing sessions over the past 30 days.
   * It will be rendered inside an element with the id "chart-1-container".
   */
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
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
  dataChart1.set({query:dateRange});
  dataChart1.execute();

  var dataChart1Table = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'metrics': 'ga:sessions,ga:hits,ga:users,ga:newUsers',
      'dimensions': 'ga:date',
      'sort': '-ga:date',
    },
    chart: {
      'container': 'charttable-1-container',
      'type': 'TABLE',
      'options': {
        'width': '100%'
      }
    }
  });
  dataChart1Table.set({query:dateRange});
  dataChart1Table.execute();
 /*var dateRangeSelector1 = new gapi.analytics.ext.DateRangeSelector({
    container: 'chart-1-container'
  })
  .set(dateRange)
  .execute();
*/
  /**
   * Creates a new DataChart instance showing top 5 most popular demos/tools
   * amongst returning users only.
   * It will be rendered inside an element with the id "chart-3-container".
   */
  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
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

  dataChart2.set({query:dateRange});
  dataChart2.execute();

  var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
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

  dataChart3.set({query:dateRange});
  dataChart3.execute();

  var dataChartCountriesTable = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:country',
      'sort': '-ga:pageviews',
      'max-results': 7
    },
    chart: {
      'container': 'chart-countriestable-container',
      'type': 'TABLE',
      'options': {
        'width': '100%',
      }
    }
  });

  dataChartCountriesTable.set({query:dateRange});
  dataChartCountriesTable.execute();

  var dataChartReferers = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
      'metrics': 'ga:pageviews',
      'dimensions': 'ga:source',
      'sort': '-ga:pageviews',
      'max-results': 7
    },
    chart: {
      'container': 'chart-referers-container',
      'type': 'PIE',
      'options': {
        'width': '100%',
        'pieHole': 4/9,
      }
    }
  });

  dataChartReferers.set({query:dateRange});
  dataChartReferers.execute();


  var dataChartTable = new gapi.analytics.googleCharts.DataChart({
    query: {
      'ids': 'ga:114480534', // The Demos & Tools website view.
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
        'width': '100%'
      }
    }
  });

  dataChartTable.set({query:dateRange});
  dataChartTable.execute();
});
</script>
<style>
/*
* DateRangeSelector Component
 */

.DateRangeSelector {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
  margin: 0 0 -1em -1em;
}

.DateRangeSelector-item {
  margin: 0 0 1em 1em;
  -webkit-box-flex: 1;
  -webkit-flex: 1 0 -webkit-calc(100% - 1em);
      -ms-flex: 1 0 calc(100% - 1em);
          flex: 1 0 calc(100% - 1em);
}

.DateRangeSelector-item > label {
  font-weight: 700;
  margin: 0 .25em .25em 0;
  display: block;
}

.DateRangeSelector-item > input {
  width: 100%;
}
@media (min-width: 570px) {
  .DateRangeSelector-item {
    -webkit-flex-basis: auto;
        -ms-flex-preferred-size: auto;
            flex-basis: auto;
    min-width:150px;
  }
}
</style>
<div class="row">
	<div class="col-md-12">
		<h3><? the_title(); ?></h3>

		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
					<header class="titles">
						<h3 class="titles-main">Statistics Period</h3>
					</header>
					<div id="date-range-container"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
					<header class="titles">
						<h3 class="titles-main">Site Traffic</h3>
						<div class="titles-sub">Sessions vs. Users</div>
					</header>

					<div id="chart-1-container"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
					<header class="titles">
						<h3 class="titles-main">Site Traffic (table)</h3>
						<div class="titles-sub">Sessions vs. Users</div>
					</header>

					<div id="charttable-1-container"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">Most Popular Pages</h3>
					<div class="titles-sub">Pageviews</div>
				</header>
					<div id="chart-2-container"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">Traffic Sources</h3>
					<div class="titles-sub">Top referers</div>
				</header>
					<div id="chart-referers-container"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">By Visitors Country</h3>
					<div class="titles-sub">Chart</div>
				</header>
					<div id="chart-3-container"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">By Visitors Country</h3>
					<div class="titles-sub">Table</div>
				</header>
					<div id="chart-countriestable-container"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="dnpb-stat-dashboard">
				<header class="titles">
					<h3 class="titles-main">Most Popular Pages</h3>
				</header>
					<div id="chart-table-container"></div>
				</div>
			</div>
		</div>

	</div>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<? the_content() ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


</section>
		</div>
	</div>
</div>
<?php get_footer(); ?>

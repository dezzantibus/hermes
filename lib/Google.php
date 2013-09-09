<?php
class Google
{

	const SECONDS_ANDREA = 60;

	private static $who = null;

	static function analytics()
	{

		return "
			<script type=\"text/javascript\">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-15643626-6']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

			</script>
		";

	}

	static function adwords($shape)
	{

		if(is_null(self::$who))
		{
			self::chooseWho();
		}


		switch($shape)
		{

			case '728x90':
				$return = self::ad728x90();
				break;

			case '160x600':
				$return = self::ad160x600();
				break;

			case '200x200':
				$return = self::ad200x200();
				break;

			case '250x250':
				$return = self::ad250x250();
				break;

			case '728x15':
				$return = self::ad728x15();
				break;

			case '125x125':
				$return = self::ad125x125();
				break;

			default:
				$return = '';
		}

		return "<div>$return</div>";

	}

	private static function ad160x600()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
					/* Hermes - 160x600 */
					google_ad_slot = "3190138742";
					google_ad_width = 160;
					google_ad_height = 600;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function ad728x90()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
					/* Hermes - 728x90 */
					google_ad_slot = "1713405549";
					google_ad_width = 728;
					google_ad_height = 90;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function ad200x200()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
					/* Hermes - 200x200 */
					google_ad_slot = "7620338341";
					google_ad_width = 200;
					google_ad_height = 200;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function ad728x15()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
					/* Hermes - 728x15 */
					google_ad_slot = "9097071549";
					google_ad_width = 728;
					google_ad_height = 15;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function ad125x125()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
					/* Hermes - 125x125 */
					google_ad_slot = "1573804745";
					google_ad_width = 125;
					google_ad_height = 125;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function ad250x250()
	{
		if(self::$who == 'Andrea')
		{
			return '
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-0866520425041689";
						/* Hermes - 250x250 */
					google_ad_slot = "5648920740";
					google_ad_width = 250;
					google_ad_height = 250;
					//-->
				</script>
				<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			';
		}
		else
		{
			return '';
		}
	}

	private static function adBlank()
	{
		if(self::$who == 'Andrea')
		{
			return '';
		}
		else
		{
			return '';
		}
	}

	private static function chooseWho()
	{
		if(self::SECONDS_ANDREA > date('s'))
		{
			self::$who = 'Andrea';
		}
		else
		{
			self::$who = 'Paolo';
		}
	}

}
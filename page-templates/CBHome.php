<?php
/**
 * Template name: CBHome
 * This is the template that displays the 
 * home page for the site.
 *
 *
 * @package WordPress
 * @subpackage Twenty_Eleven_Child
 * @ author J.R.Marlatt
 * version 1.0 April 6, 2021
 * 
 */

get_header();
?>

<!-- wp:core/text --><!-- To defeat Gutenberg and prevent changes to page -->

<!-------------------------------------HOME PAGE BOX----------------------------------------------------------------->
<div class="home-box" style="maxwidth: 1600px;">
	<hr class="Fhspace" style="clear:both; background-color:white; height:1px;">
	<div id="target-header" style="background-color: #000066; width: auto;">
		<h1 style="color: white; margin: 0; font-size: 150%; text-align: center;"><strong>Covered Bonds in the United
				States - Latest News</strong></h1>
	</div>
	<hr class="Fhspace" style="clear:both; background-color:white; height:3px;">

<!--------------------------------------HEADER PHOTOS---------------------------------------------------------------->
	<div class="home-photo" height:370px;>
		<a href="CBAggregate/">
			<img src="/wp-content/uploads/2020/01/Onepixel_878730-scaled.jpg"  title="The World War II Memorial, Washington D.C." />
		</a>
	</div>
<!---------------------------------------end Header Photos---------------------------------------------------------->

<!------------------------------------------START------------------------------------------------------------------->
	<hr class="Fhspace" style="clear:both; background-color:blue; ">
	<section class="home-container" style="width: auto;"> <!--container for content and twitter -->
		<div id="idF1container" class="F1container" style="display:flex; justify-content:space-between; width: 100%;"> <!--three column container for content-->
			<div class="homeCol" style="width: 25%; border-right: 1px solid black; padding: 0 3px 0 3px; ">
				<div class="Fbox" width=100%>      
					<!---------------------------------------Page Date--------------------------------------------------------------->
					<p
						style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
						Updated: 12/27/2025</p>
				</div>
				
				<hr class="Fhspace" style="clear: both; margin-top: 3px;">

				<div>
					<br /><strong>What is a covered bond?</strong> Perhaps that is the logical place to start for many before dealing with offerings and policy and issues. See <a href="https://www.us-covered-bonds.com/news-views/basics-of-the-u-s-market/2014/02/25/the-case-for-u-s-covered-bonds#what_are" >What are Covered Bonds.</a>
					
				</div>

				<hr class="Fhspace" style="clear: both; margin-top: 3px;">

				<div>
					<br /><strong>See all the data</strong> on U.S.$ and Canadian bank covered bond activity since 2018
					at
					<a href="CBaggregate/">Data Tables</a>.
				</div>


				<hr class="Fhspace" style="clear: both; margin-top: 3px;">
				<!---------------------------------------INFOGRAPHIC---------------------------------------------------------------->
				<div style="float:left; width:74%;">
					<br /><strong>See Mayer Brown's <a
							href="/wp-content/uploads/2026/02/At-A-Glance-Covered-Bonds-February-2026.pdf" target="blank"
							rel="noopener noreferrer"><u>Covered Bonds - At A Glance</u></a> for U.S.$ covered bond
						statistics for the period 2010 through 2025.</strong>
				</div>
				<div style="float:right; width:26%;">
					<a href="/wp-content/uploads/2026/02/At-A-Glance-Covered-Bonds-February-2026.pdf" target="blank" rel="noopener noreferrer">
						<img class="j1infog" src="/wp-content/uploads/2026/02/At-a-Glance-Covered-Bonds-February-2026.jpg"
							margin-top="5" align="right" />
					</a>
				</div>
				<!--------END INFOGRAPHIC---->
				<hr class="Fhspace" style="clear: both; margin-top: 20px;">
				<!---------------------------------------COMMENTARY------------------------------------------------------------------->
				<p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;">
					<strong>Commentary</strong>
				</p>
				<!----------------------->
				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Recent Posts. </scan> See our most recent posts on covered bonds:<br>
<ul>
<?php
    $query = new WP_Query('posts_per_page=10');
    while ($query->have_posts()) : $query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
				
				<hr>
				<img class="j2photo" title="U.S. Capitol"
					src="/wp-content/uploads/2019/01/Onepixel_33642-e1547740528637.jpg" border="0" width=40% />
								
				<p><scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Jan 2025- </scan><strong>Reg AB II - </strong>President Trump has nominated Paul Atkins to be the next Chairman of the SEC.  Paul was previously a Commissioner at the SEC from 2002 to 2008.  There is talk that the new Chairman wants to address the Reg AB II changes that require residential mortgage securitizations (RMBS) to provide loan level disclosure for 273 data items for each loan in a securitization pool.  As a result of those requirements, no new RMBS offerings have been registered with the SEC since the changes became effective in 2016.  </p>
		<p>This effort ties into the new administration’s goal of removing the GSEs (Fannie Mae and Freddie Mac) from receivership imposed on them in 2008 during the financial crisis and privatizing them.  There is a concern that privatization cannot be accomplished unless there is a strong private sector mortgage market and SEC registered RMBS is felt to be a critical part of that.  </p>
			<p>Note that relaxation of the loan level data requirements for SEC registered RMBS could also open the possibility of restarting the SEC registered covered bond programs the Canadian banks abandoned in 2016. 
</p>
			
				<hr>
				<img class="j2photo" title="U.S. Capitol"
					src="/wp-content/uploads/2018/08/arches-architecture-building-62318.jpg" border="0" width=40% />
				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Jan 2025- </scan><strong>A New Administration - </strong>eight years later  another Trump
				administration. What does it mean for covered bonds? Obviously way too early to tell. Once again we are hearing that the
				administration
				intends to move to address Fannie Mae and Freddie Mac. However, too early to know if covered bonds will
				play
				a role in any housing finance system, but we will be following closely.</p>
				<hr>
				<img class="j2photo" title="U.S. Capitol" src="/wp-content/uploads/2019/01/Onepixel_3081326.jpg"
					border="0" width=40% />
				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Jan 2019- </scan><strong>The American Banker</strong> is <a href="https://t.co/kL8eQyljrw"
					target="_blank" rel="noopener noreferrer">reporting</a> that “There’s now a confluence that’s been
				built
				around the need to really do a deep dive on national housing policy itself, which housing finance is
				just
				one important element,” according to David Jeffers, the executive vice president of policy and public
				affairs at the Council of Federal Home Loan Banks.


				<hr>
				<img class="j2photo" title="Freddie Mac"
					src="/wp-content/uploads/2014/02/icon_freddiemac_campus_HQ1c.jpg" border="0" width=40% />
				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Jan 2019- </scan><strong>Urban Institute Report on U.S. Housing. &nbsp;</strong>See our new post (
				<a href="http://us-covered-bonds.com/2019/01/08/u-s-housing-overview/" target="_blank"
					rel="noopener noreferrer">U.S. Housing Overview.</a>) on the Urban Institute Report on U.S. housing
				and
				the dominance of the GSEs in housing finance. &nbsp; The GSEs are virtually the only game in town.
				&nbsp;Is
				that risk to the taxpayers worth it? &nbsp;Why?

				<hr>

				<div style="float:left; width:45%; padding-right: 5px;"><img class="j2photo"
						title="New York Federal Reserve Bank"
						src="/wp-content/uploads/2018/12/frbny_building_preview.jpg" border="0" width=100% /></div>

				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Dec 2018- </scan><strong>NY Fed Study on Housing Finance &nbsp;</strong>The New York Federal Reserve
				Bank has released an <em>Economic Policy Review</em> entitled <a
					href="https://www.newyorkfed.org/medialibrary/media/research/epr/pdf2/epr_2018_vol24no3.pdf?la=en"
					target="_blank" rel="noopener noreferrer">The Appropriate Role of Government in U.S. Mortgage
					Markets</a>. &nbsp;Given the conservatorships of Fannie Mae and Freddie Mac, one wonders why it took
				so
				long to ask this question. &nbsp;Nevertheless, this review represents a welcome attempt to inject some
				rationality into U.S. housing finance. As the Economist <a
					href="https://www.economist.com/briefing/2016/08/20/comradely-capitalism" target="_blank"
					rel="noopener noreferrer">reported</a> yesterday, we have accidentally nationalized the U.S.
				mortgage
				market at a cost of something like one percent of GDP annually. &nbsp;It is high time to rely more on
				the
				private capital markets and less on government fiat for housing finance. &nbsp;The Economist believes
				the
				taxpayer savings would be substantial. </br></br>Starting on page 63 there is a comparison of U.S. and
				Danish mortgage financing and a recommendation that policy makers look at the Danish use of capital
				markets
				to finance mortgage loans using covered bonds.

				<hr>
				<img class="j2photo" title="White House" src="/wp-content/uploads/2018/08/White-House.jpg" border="0"
					width=40% />

				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					July 2018- </scan><strong>GSE Progress? &nbsp;</strong>The White House has proposed a plan for
				reorganization of the Government, which includes a <a
					href="https://www.whitehouse.gov/wp-content/uploads/2018/06/Government-Reform-and-Reorg-Plan.pdf"
					target="blank" rel="noopener noreferrer">plan for reorganization of the GSEs</a> that has a
				political
				twist that might actually make a difference. &nbsp;"Reform of the Federal Role in Mortgage Finance"
				begins
				in page 79 of the White House proposal. &nbsp;The plan would fully privatize Fannie Mae and Freddie Mac
				and
				give them access, together with other private entities, to a Government guarantee for a fee. Under the
				plan
				a new Federal entity would create and regulate a market for Federal guarantees. </br></br>The
				interesting
				political twist is that Fannie Mae and Freddie Mac would not longer be responsible for assisting low
				income
				borrowers. &nbsp;Instead that role would shift to the Department of Housing and Urban Development.
				&nbsp;Fannie and Freddie would lose their Federal charters and would no longer be the focus of political
				infighting over federal assistance for low income residential mortgage loan borrowers. &nbsp;Perhaps
				with
				the removal of that responsibility Fannie and Freddie will become less political and some real progress
				could be made in creating a rational structure for providing Federal support for residential mortgage
				loans.

				<hr>
				<scan
					style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">
					Jan 2018- </scan><strong>What a difference a year makes! - </strong>As we move into 2018 there isn't
				a
				whisper of covered bond legislation in the United States. &nbsp; Nothing! &nbsp; The resurrection of the
				GSEs in their old form seems to on the agenda. &nbsp; Amazing how short memories are. &nbsp; All is
				forgiven. &nbsp; $180 billion of bail-out cash is no big thing. &nbsp; We could do it again if need be,
				but
				of course this will never happen again. &nbsp; Everyone is born again! &nbsp; And what is the definition
				of
				"madness"?
				<hr class="Fhspace" style="clear: both; margin-top: 3px;">
			</div>

			<div class="homeCol" style="width:25%; border-right: 1px solid black; padding: 0 3px 0 3px; ">
				<hr class="Fhspace" style="clear: both; margin-top: 10px;">


                <p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Canadian
                        Issuers</strong></p>
                <a><img id="j1mleaf" src="http://www.us-covered-bonds.com/wp-content/uploads/2013/12/maple-leaf.png"
                        alt="maple leaf" width="25%" align="right" /></a>
                <scan style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Dec 2025 - </scan>
                <strong>2026</strong> is expected to be a year of heavy issuance for Canadian banks as 60 series of outstanding covered bonds will mature in 2026. Maturities fall across 6 currencies as follows:</br>

                <table class="CDN2016">
                <thead><th>Curr</th>	<th>#</th>	<th>Total</th></thead>
                <tbody>
                <tr><td>€</td>		<td>23</td>		<td>24,650</td></tr>
                <tr><td>$</td>		<td>11</td>		<td>13,700</td></tr>
                <tr><td>C$</td>		<td>4</td>		<td>4,400</td></tr>
                <tr><td>£</td>		<td>5</td>		<td>10,100</td></tr>
                <tr><td>A$</td>		<td>8</td>		<td>9,200</td></tr>
                <tr><td>CHF</td>    <td>5</td>      <td>1,260</td></tr>
                </tbody></table>
                See <a href="cdn_issue_details">Canadian Issuance.</a><br>See also <a href="https://bit.ly/3Y6ZUu2">GlobalCapital.</a><br><br>
                <strong>2025</strong> was not a year of heavy issuance after all.  Only 22 offerings came to market, marking two slow years in a row for Canadian banks.
                <hr>
                <scan style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Jan 2025- </scan><strong>2025 </strong>is likely to be a more active year for the Canadian banks as 2024 was a remakably slow year for them (see below).
                <hr>
                <scan style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Jan 2025- </scan>
                <strong>2024</strong> was a slow year for Canadian issuance of covered bonds.  Canadian banks came to the market with 31 offerings of covered bonds in $, €, £, C$, A$ and CHF currencies compared to 69 deals in 2023. &nbsp Many 2024 offerings were reverse inquiries of less than benchmark size. &nbsp The distribution of offerings across currencies was as follows:</br>

                <table class="CDN2016">
                <thead><th>Curr</th>	<th>#</th>	<th>Total</th></thead>
                <tbody>
                <tr><td>€</td>		<td>14</td>		<td>13,350</td></tr>
                <tr><td>$</td>		<td>5</td>		<td>5.075</td></tr>
                <tr><td>C$</td>		<td>1</td>		<td>1,000</td></tr>
                <tr><td>£</td>		<td>5</td>		<td>4,350</td></tr>
                <tr><td>A$</td>		<td>4</td>		<td>2,300</td></tr>
                <tr><td>CHF</td>    <td>2</td>      <td>440</td></tr>
                </tbody></table>
                See <a href="cdn_issue_details">Canadian Issuance</a>.<hr>

                <hr class="Fhspace" style="clear: both; margin-top: 10px;" />
<!---------------------------------------NON-CANADA US$ ISSUERS------------------------------------------------------------------->
				<p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Other US$
						Issuers</strong></p>
<!----------------------->
                <scan style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Jan 2025- </scan>USD offerings by non-Canadian banks was quite low in 2024. There were 10 offerings for a total of $8.9B. Only three such banks, LBBW, Santander and newcomer Shinhan Bank of Korea issued in USD. &nbsp Note that issuance volume and frequency for foreign banks is largely determined by cross currency swap costs of converting the USD proceeds to their home currency. 
				<hr class="Fhspace" style="clear: both; margin-top: 20px;" />
<!-------------------------------HOT TOPICS------------------------------------>
				<p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Hot
						Topics</strong></p>

                <scan style="font-family: 'Georgia'; font-variant: small-caps; font-size: 80%; font-weight: bold; margin: 0 0 0.625% 0; padding:0; border:0; line-height:70%">Jan 2025- </scan><strong>Equivalence</strong> - perhaps no topic is as important to non-EU issuers of covered bonds as equivalent treatment of their bonds for EU bank capital purposes.  See, e.g., the ECBC's <a href="https://hypo.org/ecbc/publication-news/achieving-third-country-equivalence/" target="_blank" rel="noopener noreferrer"><u>statement</u></a> or S&#38P's <a href="https://www.spglobal.com/ratings/en/research/articles/240626-eu-covered-bond-harmonization-next-steps-13154039" target="_blank" rel="noopener noreferrer"><u>statement</u></a> on equivalence and Fitch's  <a href="https://www.fitchratings.com/research/structured-finance/covered-bonds/australia-canada-uk-covered-bonds-well-placed-for-eu-equivalence-24-08-2022" target="_blank" rel="noopener noreferrer"><u>statement</u></a> that non-EU covered bonds have similar risk.  The absence of equivalent treatment means that non-EU covered bonds do not price as favorably as EU covered bonds.
				

				<hr class="Fhspace" style="clear: both; margin-top: 20px;">
					</div>

					
					<div class="homeCol" style="width:25%; border-right: 1px solid black; padding: 0 3px 0 3px; ">

					<hr class="Fhspace" style="clear: both; margin-top: 10px;" />
<!------------------------REGULATORY DEVELOPMENTS-------------------------------------->
					<p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Regulatory
							Developments</strong></p>
						
					    <strong>ABS Concept Release.</strong> On September 26, 2025, the SEC published a concept release on residential mortgage-backed securities disclosures. See <a href="https://www.federalregister.gov/documents/2025/10/01/2025-19152/concept-release-on-residential-mortgage-backed-securities-disclosures-and-enhancements-to">ABS Release.</a> Of interest as well is the <a href="https://www.sec.gov/newsroom/speeches-statements/atkins-2025-concept-release-rmbs-abs">statement</a> of Chairman Paul Atkins on the release. In his remarks, Chairman Atkins said "[t]he concept release is the first step in the Commission’s efforts to revitalize the public market for RMBS and modernize the agency’s regulations of ABS." It may also be the first and necessary step in addressing the conservatorship of the GSEs. <br><br>A possible parallel approach might be to enable U.S. issuers to issue covered bonds. Why not enable another working alternative to give us the best chance of supporting the housing finance market? See <a href="https://www.us-covered-bonds.com/2014/09/11/use-cbs-to-restart-the-pls-market/">Use CBs to Restart the PLS Market.</a>
						<hr>
						
						<strong>Basel III Endgame</strong> - <a title="Basel Endgame"
						href="https://www.federalregister.gov/documents/2023/09/18/2023-19200/regulatory-capital-rule-large-banking-organizations-and-banking-organizations-with-significant">U.S. banking agencies announced proposed final Basel III regulations, which would have the effect of significant increases in capital requirements for banks, including foreign banks, operating in the U.S.</a> <a title="Basel Endgame"
						href="https://www.federalregister.gov/documents/2023/09/18/2023-19200/regulatory-capital-rule-large-banking-organizations-and-banking-organizations-with-significant" target="_blank" rel="noopener noreferrer">See the
						full <u>rule proposal.</u></a>
					<hr>
						
						<strong>Bank of Canada</strong> - <a title="BoC Repo Program"
						href="https://www.bankofcanada.ca/2020/03/bank-of-canada-announces-temporary-expansion-to-the-list-of-eligible-securities-for-its-term-repo-operations-and-changes-to-upcoming-operations/">The Canadian central bank announced the eligibility of covered bonds in its repo porgram. Now Canadian banks can access liquidity in the same manner as EU banks.</a> See the <a title="BoC Repo Progeam"
						href="https://www.bankofcanada.ca/2020/03/bank-of-canada-announces-temporary-expansion-to-the-list-of-eligible-securities-for-its-term-repo-operations-and-changes-to-upcoming-operations/" target="_blank" rel="noopener noreferrer">
						<u>announcement.</u></a>
					<hr>

					<strong>BCBS</strong> - <a title="Basle Securitization"
						href="http://www.bis.org/press/p141211.htm">Basle has announced increased capital requirements
						for securitization exposures.</a> <a title="Basle Securitization"
						href="http://www.bis.org/bcbs/publ/d303.pdf" target="_blank" rel="noopener noreferrer">See the
						<u>full report.</u></a>
					<hr>
						
						<strong>Volcker Rule Amendment</strong> - <a title="Volcker Rule"
						href="https://www.federalregister.gov/documents/2020/07/31/2020-15525/prohibitions-and-restrictions-on-proprietary-trading-and-certain-interests-in-and-relationships-with">The Volcker Rule was amended and provides some important clarity.</a> <a title="Volcker Rule"
						href="https://www.federalregister.gov/documents/2020/07/31/2020-15525/prohibitions-and-restrictions-on-proprietary-trading-and-certain-interests-in-and-relationships-with" target="_blank" rel="noopener noreferrer">See the
						full <u>amendment.</u></a>
					<hr>
						
					<strong>Final Risk Retention</strong> - <a title="Risk Retention"
						href="http://www.mofo.com/~/media/Files/ClientAlert/2014/10/141021USRegulatorsFinalizeCreditRiskRetentionRules.pdf">The
						SEC has finalized its risk retention rule for securitizations.</a> &nbsp;<a
						href="http://www.gpo.gov/fdsys/pkg/FR-2014-12-24/pdf/2014-29256.pdf" target="_blank"
																									rel="noopener noreferrer">See the full text of the <u>final rule. </u></a>
					<hr>
					<strong>Reg AB II and Covered Bonds</strong> - <a title="Reg AB II"
						href="https://www.federalregister.gov/articles/2014/09/24/2014-21375/asset-backed-securities-disclosure-and-registration" target="_blank" rel="noopener noreferrer">Reg AB II loan level requirements for residential mortgage securitization were viewed as an impossible burden by Canadian banks and led them to abandoning SEC registered covered bond programs in 2016 when the changes became effective.</a>
					<hr>
					<strong>Final Reg AB II</strong> - <a title="Final Reg AB II"
						href="http://www.us-covered-bonds.com/2014/08/29/sec-finalizes-reg-ab-ii/">SEC finalizes the
						amendments to Regulation AB</a>
					<hr>
					<strong>U.S. Treasury</strong><a title="Treasury"
						href="http://www.regulations.gov/#!docketDetail;D=TREAS-DO-2014-0005"> - United States
						Department of the Treasury has requested comments on the private sector development of a
						well-functioning private label securities (PLS) market for residential mortgage loans. </a><a
						href="http://www.gpo.gov/fdsys/pkg/FR-2014-06-30/pdf/2014-15355.pdf"> See the original
						request.</a>
					<hr>
					<strong>LCR in Canada </strong><a title="Commentary" href="canadian-news#LCR">Covered bonds qualify
						for LCR Level 2A.</a>
					<hr>
					<strong>Volcker Rule</strong> - <a title="Volker Rule" href="miscellaneous-new#volker-rule">only
						<em>foreign</em> bank covered bonds are carved out of the prohibitions in the rule?</a>

					<hr class="Fhspace" style="clear: both; margin-top: 20px;" />

<!----------------------------------TECHNICAL------------------------------------------------>
					<p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Technical
							Notes</strong></p>

					<ul style="margin: 0 0 0 1;">
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#ECB-eligibility">ECB
								Eligibility</a></li>
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#FED-eligibility">FED
								Eligibility</a></li>
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#BOE-eligibility">BOE
								Eligibility</a></li>
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#TRACE-eligibility">TRACE
								Eligibility</a></li>
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#INDEX-eligibility">INDEX
								Eligibility</a></li>
						<li><a title="Technical Notes"
								href="http://www.us-covered-bonds.com/technical-notes#LCR-eligibility">LCR
								Eligibility</a></li>
					</ul>
					<hr class="Fhspace" style="clear: both; margin-top: 3px;">
			</div>
		<!---</div>	--->

        <div class="twitter-container homeCol"
                style="padding: 3px; width:25%;">
            <hr class="Fhspace" style="clear: both; margin-top: 10px;" />
<!------------------------TWEETS FROM X-------------------------------------->
            <p style="color: #3366ff; text-decoration: underline; background-color: #b5c7e2;"><strong>Tweets</strong></p>

            <?php echo do_shortcode('[custom-twitter-feeds feed=1]'); ?>
					<br>

<!------XDeveloper code---------------------------->
            <a class="twitter-timeline" 
                href="https://twitter.com/XDevelopers?ref_src=twsrc%5Etfw">
                Tweets by XDevelopers
            </a> 



			</div>
       </div>


	
	</section>

    <!---Responsive Page---------------------------->
	<script>
		// Detect mobile device and change to single column
	document.addEventListener('DOMContentLoaded', jmMobile);
   screen.orientation.addEventListener('change', jmMobile); 
		
  function jmMobile() {
    setTimeout(() => {
	var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    var myDiv = document.getElementById('idF1container');
	let elements = document.getElementsByClassName("homeCol");
    const jm2Width = window.innerWidth;
    
    if (isMobile && jm2Width < 600) {
		myDiv.style.display = "block";    // Change to block display
		// Loop through and change width to 100%
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.width = "100%";
        }
	} else {
		myDiv.style.display = "flex";     // Stamdard flex dosplay
		// Loop through and change width to 25%
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.width = "25%";
        }
	}
}, 200);
  }
	</script>
 
	<!---End Responsive Page---------------------------->

<!-- make page full screen -->
<script>
/* Get the element you want displayed in fullscreen mode (a video in this example): */
var elem = document.getElementById("page");

/* When the openFullscreen() function is executed, open the video in fullscreen.
Note that we must include prefixes for different browsers, as they don't support the requestFullscreen method yet */
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>

<?php get_footer(); ?>


</body>
<!-- /wp:core/text -->
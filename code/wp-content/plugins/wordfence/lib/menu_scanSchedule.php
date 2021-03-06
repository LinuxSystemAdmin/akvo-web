<div class="wordfenceModeElem" id="wordfenceMode_scanScheduling"></div>
<div class="wrap wordfence" id="paidWrap">
	<?php require('menuHeader.php'); ?>
	<?php $pageTitle = "Schedule when Wordfence Scans Occur"; $helpLink="http://docs.wordfence.com/en/Wordfence_scan_scheduling"; $helpLabel="Learn more about Scheduling Wordfence Scans"; include('pageTitle.php'); ?>
	<?php
	$rightRail = new wfView('marketing/rightrail', array('additionalClasses' => 'wordfenceRightRailScanSchedule'));
	echo $rightRail;
	?>
<?php if(! wfConfig::get('isPaid')){ ?>
	<div class="wf-premium-callout" style="margin: 20px;">
		<h3>Scan Scheduling is only available to Premium Members</h3>
		<p>Premium users can increase their WordPress protection by controlling scan frequency up to once per hour. Premium also allows you to control when Wordfence initiates a scan, selecting optimal times that don’t interfere with high-traffic or optimal usage of your site.</p>

		<p>Upgrade today:</p>
		<ul>
			<li>Receive real-time Firewall and Scan engine rule updates for protection as threats emerge</li>
			<li>Other advanced features like IP reputation monitoring, an advanced comment spam filter, country blocking and cell phone sign-in give you the best protection available</li>
			<li>Access to Premium Support</li>
			<li>Discounts of up to 90% available for multiyear and multi-license purchases</li>
		</ul>
		<p class="center"><a class="button button-primary"
		                     href="https://www.wordfence.com/gnl1scanSched1/wordfence-signup/" target="_blank">Get Premium</a></p>
	</div>
<?php } ?>

	<div class="wordfenceWrap" style="margin: 20px 20px 20px 30px; max-width: 900px;">
		<p>
			<strong>Current time:</strong>&nbsp;<?php echo date('l jS \of F Y H:i:s A', current_time('timestamp')); ?>
			<br /><strong>Next scan will start at:</strong>&nbsp;
			<span id="wfScanStartTime">
			<?php 
				$nextTime = wordfence::getNextScanStartTime();
				if($nextTime){
					echo $nextTime;
				}
			?>
			</span>
		</p>
		<p>
			<strong>Scan mode:</strong><select id="schedMode" onchange="WFAD.sched_modeChange();">
				<option value="auto"<?php echo (wfConfig::get('schedMode') == 'auto' ? ' selected' : ''); ?>>Let Wordfence automatically schedule scans (recommended)</option>
				<option value="manual"<?php echo (wfConfig::get('schedMode') == 'manual' ? ' selected' : ''); ?>>Manually schedule scans using calendar below</option>
				</select>
		<p>
			<strong>Shortcuts</strong>:
			<a href="#" onclick="WFAD.sched_shortcut('onceDaily'); return false;">Once a day</a>,
			<a href="#" onclick="WFAD.sched_shortcut('twiceDaily'); return false;">Twice a day</a>,
			<a href="#" onclick="WFAD.sched_shortcut('weekends'); return false;">Weekends</a>,
			<a href="#" onclick="WFAD.sched_shortcut('oddDaysWE'); return false;">Odd days and weekends</a>,
			<a href="#" onclick="WFAD.sched_shortcut('every6hours'); return false;">Every 6 hours</a>,
		</p>

		<table border="0">
		<?php
		$daysOfWeek = array(
			array(1, 'Monday'), 
			array(2, 'Tuesday'), 
			array(3, 'Wednesday'), 
			array(4, 'Thursday'), 
			array(5, 'Friday'), 
			array(6, 'Saturday'), 
			array(0, 'Sunday')
			);
		$sched = wfConfig::get_ser('scanSched', array());
		foreach($daysOfWeek as $elem){
			$dayIndex = $elem[0];
			$dayName = $elem[1];
			require('schedWeekEntry.php');
		}
		?>
		</table>
		<table border="0" cellpadding="0" cellspacing="0"><tr>
			<td>
				<input type="button" name="but3" class="button-primary" value="Save Scan Schedule" onclick="WFAD.sched_save();" />
			</td>
			<td style="height: 24px;"><div class="wfAjax24"></div><span class="wfSavedMsg">&nbsp;Your changes have been saved!</span></td>
		</tr>
		</table>
	</div>
	<br />
</div>

<script type="text/x-jquery-template" id="wfWelcomeContentScanSched">
<div>
<h3>Premium Feature: Scan Scheduling</h3>
<strong><p>Want full control over when your scans run?</p></strong>
<p>
	If you upgrade to our premium version you will have access to our scan scheduling feature.
	This gives you full control over when and how frequently your site is scanned
	for security vulnerabilities and intrusions.
</p>
<p>
	If your site gets a surge of traffic in the mornings, you may choose to run
	two scans in the late afternoon and at midnight, for example. Or if you
	are experiencing an unusually high number of attacks, you might choose
	to run scans once every two to four hours to be extra vigilant during the attack.
<p>
<?php
if(wfConfig::get('isPaid')){
?>
	You have upgraded to the premium version of Wordfence and have full access
	to this feature along with our other premium features and priority support.
<?php
} else {
?>
	If you would like access to this premium feature, please 
	<a href="https://www.wordfence.com/gnl1scanSched2/wordfence-signup/" target="_blank">upgrade to our Premium version</a>.
</p>
<?php
}
?>
</div>
</script>

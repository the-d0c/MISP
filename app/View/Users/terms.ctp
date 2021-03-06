<div class="users form">
<h2>MISP Terms and Conditions</h2>
<?php
	$embedableExtensions = array('pdf');
	if (!Configure::read('MISP.terms_file')) {
		$termsFile = APP ."View/Users/terms";
	} else {
		$termsFile = APP . 'files' . DS . 'terms' . DS . Configure::read('MISP.terms_file');
	}
	if (!(file_exists($termsFile))) {
		echo "<p>Terms and Conditions file not found.</p>";
	} else {
		if (!Configure::read('MISP.terms_download')) {
			$terms = new File($termsFile, false);
			echo $terms->read(true,'r');
			$terms->close();
		} else {
			?>
				<a href="<?php echo $baseurl;?>/users/downloadTerms" class="btn btn-inverse">Download Terms and Conditions</a>
			<?php
		}
	}
	if (!$termsaccepted) {
		echo "<br /><br />";
		echo $this->Form->create('User');
		echo $this->Form->hidden('termsaccepted', array('default' => '1'));
		echo $this->Form->submit('Accept Terms', array('class' => 'btn btn-primary'));
		echo $this->Form->end();
	}
?>
</div>
<?php
	echo $this->element('side_menu', array('menuList' => 'globalActions', 'menuItem' => 'terms'));
?>

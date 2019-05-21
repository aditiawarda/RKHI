<!-- gallery -->
<div class="jarallax w3ls-gallery agile-section" id="gallery">
	<h3 class="agileits-title" style="color: orange;">GALERI VIDEO CONTENT</h3>
	<div class="container">
		<div class="dropdown">
			<button class="btn dropdown-toggle center" style="background-image: -webkit-linear-gradient(top, orange 0%, orange 100%); padding-right: 85%; color: white" type="button" data-toggle="dropdown">KATEGORI VIDEO
			<span class="caret"></span></button>
			<ul class="dropdown-menu" style="padding-right: 81.5%">
				<li><a href="#hukumkeluarga" >HUKUM KELUARGA</a></li>
				<li><a href="#keuangansyariah">KEUANGAN SYARIAH</a></li>
				<li><a href="#pidanaislami">PIDANA ISLAMI</a></li>
				<li><a href="#fiqihibadah">FIQIH IBADAH</a></li>
				<li><a href="#alquranhadist">AL-QURA'AN & HADIST</a></li>
			</ul>
		</div>
	</div>
		<div id="hukumkeluarga">
		<ul class="w3l-grid" style="margin-top: 30px; padding-bottom: 400px">
			<h3 class="agileits-title" style="font-size: 20pt">HUKUM KELUARGA</h3>
				<?php foreach($video_content as $i):?>
			<li class="col-xs-3">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls="true">
						<source src="<?= base_url('./uploads/'.$i->judul);?>.mp4" type="video/mp4" />
					</video>
				</div>
			</li>
				<?php endforeach;?>
		</ul>
	</div>


	<div id="keuangansyariah">
		<ul class="w3l-grid" style="margin-top: 30px; padding-bottom: 400px">
			<h3 class="agileits-title" style="font-size: 20pt">KEUANGAN SYARIAH</h3>
				<?php foreach($video_content as $i):?>
			<li class="col-xs-3">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls="true">
						<source src="<?= base_url('./uploads/'.$i->judul);?>.mp4" type="video/mp4" />
					</video>
				</div>
			</li>
				<?php endforeach;?>
		</ul>
	</div>

	<div id="pidanaislami">
		<ul class="w3l-grid" style="margin-top: 30px; padding-bottom: 400px">
			<h3 class="agileits-title" style="font-size: 20pt">PIDANA ISLAMI</h3>
				<?php foreach($video_content as $i):?>
			<li class="col-xs-3">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls="true">
						<source src="<?= base_url('./uploads/'.$i->judul);?>.mp4" type="video/mp4" />
					</video>
				</div>
			</li>
				<?php endforeach;?>
		</ul>
	</div>

	<div id="fiqihibadah">
		<ul class="w3l-grid" style="margin-top: 30px; padding-bottom: 400px">
			<h3 class="agileits-title" style="font-size: 20pt">FIQIH IBADAH</h3>
				<?php foreach($video_content as $i):?>
			<li class="col-xs-3">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls="true">
						<source src="<?= base_url('./uploads/'.$i->judul);?>.mp4" type="video/mp4" />
					</video>
				</div>
			</li>
				<?php endforeach;?>
		</ul>
	</div>

	<div id="alquranhadist">
		<ul class="w3l-grid" style="margin-top: 30px">
			<h3 class="agileits-title" style="font-size: 20pt">AL QUR'AN DAN HADIST</h3>
				<?php foreach($video_content as $i):?>
			<li class="col-xs-3">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls="true">
						<source src="<?= base_url('./uploads/'.$i->judul);?>.mp4" type="video/mp4" />
					</video>
				</div>
			</li>
				<?php endforeach;?>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>
<!-- //gallery -->
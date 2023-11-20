<form action="landing_page.php" method="get">
	<ul class="list-group mb-3">
		<p class="cardHeader"> By price</p>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="price" name="price" value="1000">500-1000$ </input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="price" name="price" value="1500">1000-1500$ </input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="price" name="price" value="2000">1500-2000$ </input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="price" name="price" value="2500">2000-2500$ </input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="price" name="price" value="2501">2500$ and Above</input>
			</div>
		</li>
		<br>
		<p class="cardHeader"> RAM size</p>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="RAM" name="RAM" value="8"> 8GB</input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="RAM" name="RAM" value="16">16GB</input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="RAM" name="RAM" value="32">32GB</input>
			</div>
		</li>
		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<input type="radio" class="RAM" name="RAM" value="64">64GB</input>
			</div>
		</li>
		<br>
		<input type="submit" class="btn btn-primary" value="Submit">
	</ul>
</form>
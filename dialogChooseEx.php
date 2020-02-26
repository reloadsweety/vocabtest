<div id="chooseEx">
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Words Choice</a>
			</li>
			<li><a href="#tabs-2">Matching Words</a>
			</li>
		</ul>
		<div id="tabs-1">
			<h1 align="center">Choose choice is correct</h1>
			 <div id="radio">
			    <input type="radio" id="radio1" name="radio"><label for="radio1">Choice 1</label>
			    <input type="radio" id="radio2" name="radio" checked="checked"><label for="radio2">Choice 2</label>
			    <input type="radio" id="radio3" name="radio"><label for="radio3">Choice 3</label>
			  </div>
		</div>
		<div id="tabs-2">
			<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus
				gravida ante, ut pharetra massa metus id nunc. Duis scelerisque
				molestie turpis. Sed fringilla, massa eget luctus malesuada, metus
				eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet
				fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam.
				Praesent in eros vestibulum mi adipiscing adipiscing. Morbi
				facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut
				posuere viverra nulla. Aliquam erat volutpat. Pellentesque
				convallis. Maecenas feugiat, tellus pellentesque pretium posuere,
				felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris
				consectetur tortor et purus.</p>
		</div>
	</div>
</div>
<script>
	$( "#tabs" ).tabs();
	$( "#radio" ).buttonset();
</script>


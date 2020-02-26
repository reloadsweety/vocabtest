<script>
	$(function() {
		$("#sortable1").disableSelection();

		$("#sortable2").sortable({
			placeholder : "ui-state-highlight"
		});
		$("#sortable2").disableSelection();
	});
</script>
<div id="ex2">
	<div align="center">
		<table width="600px">
			<thead>
				<tr>
					<td style="width: 45%"></td>
				<td style="width: 55%"></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<ul id="sortable1">
							<li class="ui-state-default">Item 1</li>
							<li class="ui-state-default">Item 2</li>
							<li class="ui-state-default">Item 3</li>
							<li class="ui-state-default">Item 4</li>
							<li class="ui-state-default">Item 5</li>
						</ul>
					</td>
					<td>
						<ul id="sortable2">
							<li class="ui-state-default">Item 1</li>
							<li class="ui-state-default">Item 2</li>
							<li class="ui-state-default">Item 3</li>
							<li class="ui-state-default">Item 4</li>
							<li class="ui-state-default">Item 5</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<div id="finish">Finish</div>
		<div id="next">Next</div>
	</div>
</div>
<div id="concludeEx2" style="display:none;">
	<div>
		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	</div>
</div>

<div id="dialog" title="Basic dialog">
  <table id="tbShowVocabEx2" width="430px">
  <thead><tr><td width="50%" ></td><td width="50%"></td></tr></thead>
  <tbody></tbody>
  </table>
</div>



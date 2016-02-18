<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script src="//use.typekit.net/lqk4yck.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
		<script src="scripts/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/style_administration.css"/>
		<link rel="stylesheet" type="text/css" href="styles/mobile-style.css"/>
	</head>
	<body>
		<div>
			<form>
				<table class="CodeTable" cols="3">
					<tr>
						<td>
							<select>
								<?php
								$servername = "localhost";
								$username = "ktulu";
								$password = "rgclw3jtrpgh3drc";
								$dbname = "Tinygiantz";
								$connection = mysqli_connect($servername, $username, $password, $dbname);
								$sqlQuery = "SELECT * FROM Films";
								$sqlResult = mysqli_query($connection, $sqlQuery);

								while($rowResult = mysqli_fetch_assoc($sqlResult)){
									$title = $rowResult["Title"];
									$postID = $rowResult["PostID"];
									$publicationDate = $rowResult["PublicationDate"];
									echo "<option value=\"$postID\">$publicationDate - $title</option>";
								}
								mysqli_close($conn);
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" name="category" value="action">Action&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="category" value="animation">Animation&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="category" value="comedy">Comedy&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="category" value="documentary">Documentary&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="category" value="drama">Drama&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="category" value="suspense">Suspense
						</td>
					</tr>
					<tr>
						<td>
							<select id="timeSelection">
								<option value="">Film length</option>
								<option value="t0-5">0-5 min</option>
								<option value="t5-15">5-15 min</option>
								<option value="t15-30">15-30 min</option>
								<option value="t30-60">30-60 min</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title0" value="Title" id="Title"><br><textarea class="textinput" name="title" id="title" value="Text" placeholder="Enter a title."></textarea></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title1" value="Description" id="descriptionTitle"><br><textarea class="textinput" name="description" id="description" value="Text" placeholder="Enter a description."></textarea><input type="button" id="linebreak_description" onClick="linebreak_description();" value="Insert line break"></td>
						<td class="output" rowspan="8"><h1>HTML</h1><div id="codeOutputDiv"><textarea class="codeOutput" name="codeOutput" readonly="true" value="" id="code" onclick="this.select();"></textarea><input type="button" class="formbutton" value="Preview post" OnClick="preview2();"/>&nbsp;<input type="button" class="formbutton" value="Preview list" OnClick="preview();"/></div><h1>Tags</h1><div id="tagsOutputDiv"><textarea class="tagsOutput" name="tagsOutput" readonly="true" value="" id="tags"></textarea></div><hidden class="tagsHidden" name="tagsHidden" value="TagsHidden" id="tagsHidden"></hidden><h1>Categories</h1><div id="categoriesOutputDiv"><textarea class="categoriesOutput" name="categoriesOutput" readonly="true" value="" id="categoriesOutput"></textarea></div>
						</td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title2" value="Director" id="directorTitle"><br><textarea class="textinput" name="director" value="Text" id="director" placeholder="Enter names, comma (,) separated. Example: John Doe, Jane Doe"></textarea><hidden class="textinputHidden" name="directorHidden" value="TextHidden" id="directorHidden"></hidden></td>
					</tr>					
					<tr>
						<td class="title"><input class="titleinput" name="title3" value="Producer" id="producerTitle"><br><textarea class="textinput" name="producer" value="Text" id="producer" placeholder="Enter names, comma (,) separated. Example: John Doe, Jane Doe"></textarea><hidden class="textinputHidden" name="producerHidden" value="TextHidden" id="producerHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title4" value="Screenplay" id="screenplayTitle"><br><textarea class="textinput" name="screenplay" value="Text" id="screenplay" placeholder="Enter names, comma (,) separated. Example: John Doe, Jane Doe"></textarea><hidden class="textinputHidden" name="screenplayHidden" value="TextHidden" id="screenplayHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title5" value="DoP" id="dopTitle"><br><textarea class="textinput" name="dop" value="Text" id="dop" placeholder="Enter names, comma (,) separated. Example: John Doe, Jane Doe"></textarea><hidden class="textinputHidden" name="dopHidden" value="TextHidden" id="dopHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title6" value="Cast" id="castTitle"><br><textarea class="textinput" name="cast" value="Text" id="cast" placeholder="Enter names, comma (,) separated. Example: John Doe, Jane Doe"></textarea><hidden class="textinputHidden" name="castHidden" value="TextHidden" id="castHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title7" value="Year"  id="yearTitle"><br><textarea class="textinput" name="year" value="Text" id="year" placeholder="Enter year. (YYYY)"></textarea><hidden class="textinputHidden" name="yearHidden" value="TextHidden" id="yearHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title8" value="Country" id="countryTitle"><br><textarea class="textinput" name="country" value="Text" id="country" placeholder="Enter country."></textarea><hidden class="textinputHidden" name="countryHidden" value="TextHidden" id="countryHidden"></hidden></td>
					</tr>
					<tr>
						<td class="title"><input class="titleinput" name="title9" value="Trivia" id="triviaTitle"><br><textarea class="textinput" name="trivia" value="Text" id="trivia" placeholder="Enter trivia."></textarea><input type="button" onClick="linebreak_trivia();" id="linebreak_trivia" value="Insert line break"></td>
					</tr>
					<tr>
						<td>
							<input type="button" class="formbutton" value="Execute" OnClick="replaceChar();"/>
							<input type="reset" class="formbutton" value="Reset" onClick="return confirm('Do you really want to reset?')"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
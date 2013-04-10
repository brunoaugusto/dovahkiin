Skyrim Dragon Name Generator and Dragon Name Translator using
<a href="http://elderscrolls.wikia.com/wiki/Dragon_Language" rel="nofollow">	Elder Scrolls Dragon Language Reference
</a>

Before use it a couple things must be done:

<ol>

	<li>
		In <strong>index.php</strong> file adjust the path to Next Framework at line 29
	</li>

	<li>

		<p>
			In <strong>application.php</strong> file, located at <em>application/dovahkiin</em> subdirectory, adjust the basepath in the class comment, at line 22
		</p>

		<p>
			This is required to tell the Router where the application starts.
		</p>

		<p>
			By default <strong>/finished</strong> is defined because is the directory name where my finished projects reside.
		</p>

		<p>
			If you decide to leave the application in the root of your web folder, simply delete that line :)
		</p>
	</li>

	<li>
		<p>This is totally optional!</p>

		<p>
			By default the only two routes defined are prefixed with <strong>/generator</strong>
		</p>

		<p>
			In a hypothetical scenario, this means you can access the application from <em>yourdomain.com/any/subdirectory/you/defined/application_folder/generator<em>
		</p>

		<p>
			In a more effective scenario, considering the project in the root of web folder, no subpaths, and project folder named as <strong>dovahkiin</strong>, the access URL would be <em>localhost/dovahkiin/generator</em>
		</p>

		<p>
			This decision was made in order to prepare the application for new resources related to Skyrim World which, probably, will never be developed (duh)
		</p>

		<p>
			So, if you want, you can remove the term <strong>generator</strong>, leaving only the single slash.
		</p>

		<p>
			But do not remove the slash, otherwise you will never be able to access the page XD
		</p>

	</li>

</ol>
<?php $__env->startSection('content'); ?>

<h1>Gundlagen</h1>
<br>
<h3>Input</h3>
Sicherstellung, dass kein Schadcode im Inputfeld ist
<br>

- Konvertieren beim Speichern<br>
<pre class="line-numbers language-php">
    <code>
	    $object->exampletext = strip_tags($value, <?php echo htmlspecialchars('\'<b><strong><i><em><u>\''); ?>);
	    $object->save();
    </code>
</pre>

- Anzeige in Php (Blade)
<pre class="line-numbers language-markup">
    <code>
	    strip_tags(nl2br($exampletext))
    </code>
</pre>


<br>
<h3>Routes</h3>
- Sind alle alle geschützen Bereiche durch eine Middle geschützt.

<br>
<br>
<h3>Model CRUD</h3>
- Darf der Benutzer nur Objekte ändern bzw löschen welche er selbst erstellt hat.<br><br>
1. Controller<br>
<pre class="line-numbers language-php">
    <code>
		if ($object->user_id == Auth::id()) {
			//todo
		}
		else {<br>
			 return abort(404);
		}<br>
    </code>
</pre>
<br>
2. Middleware
- wenn das Objekt in der URL mitgeschickt wird
Route:<br>
<pre class="line-numbers language-php">
    <code>
		Route::get('/example/{object}', 'ExampleController@home')->middleware('isObjektOwner');
    </code>
</pre>
Middleware:<br>
<pre class="line-numbers language-php">
    <code>
		use Auth;
		class isObjektOwner
		{
		    public function handle($request, Closure $next)
		    {
		    	if (Auth::id() == $request->route()->parameter('objekt')->user_id) {
		    		return $next($request);
		    	}
		    	return redirect('/');
		    }
		}
    </code>
</pre>



		
<h3>Formulare</h3>
- capcha eingabe


<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
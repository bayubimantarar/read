@extends('layouts.front-end')

@section('content')
<section class="post-list post-content"><div class="post-data">
  <img src="/assets/img/post-image.jpg"></img>
  <h1 class="post-page-title">Styling</h1>
  <p class="post-meta-data">01 June 2016</p>

 <p>You're live! Nice. We've put together a little post to introduce you get you started. When you arrive, you can select this post from a list on the left and see a preview of it on the right. Click the little pencil icon at the top of the preview to edit this post and read the next section!</p>

<h2 id="gettingstarted">Getting Started</h2>

<p>Ghost uses something called Markdown for writing. Essentially, it's a shorthand way to manage your post formatting as you write!</p>

<p>Writing in Markdown is really easy. In the left hand panel of Ghost, you simply write as you normally would. Where appropriate, you can use <em>shortcuts</em> to <strong>style</strong> your content. For example, a list:</p>

<ul>
<li>Item number one</li>
<li>Item number two
<ul><li>A nested item</li></ul></li>
<li>A final item</li>
</ul>

<p>or with numbers!</p>

<ol>
<li>Remember to buy some milk  </li>
<li>Drink the milk  </li>
<li>Tweet that I remembered to buy the milk, and drank it</li>
</ol>

<h3 id="links">Links</h3>

<p>Want to link to a source? No problem. If you paste in a URL, like <a href="http://classpixels.com/">http://classpixels.com</a> - it'll automatically be linked up. But if you want to customise your anchor text, you can do that too! Here's a link to <a href="http://ghost.org/">the Ghost website</a>. Neat.</p>

<h3 id="whataboutimages">What about Images?</h3>

<p>Images work too! Already know the URL of the image you want to include in your article? Simply paste it in like this to make it show up:</p>

<p><img src="/assets/img/post-image.jpg" alt="Post-image" /></p>

<p>Not sure which image you want to use yet? That's ok too. Leave yourself a descriptive placeholder and keep writing. Come back later and drag and drop the image in to upload:</p>

<h3 id="quoting">Quoting</h3>

<p>Sometimes a link isn't enough, you want to quote someone on what they've said. Perhaps you've started using a new blogging platform and feel the sudden urge to share their slogan? A quote might be just the way to do it!</p>

<blockquote>
  <p>Ghost - Just a blogging platform</p>
</blockquote>

<h3 id="workingwithcode">Working with Code</h3>

<p>Got a streak of geek? We've got you covered there, too. You can write inline <code>&lt;code&gt;</code> blocks really easily with back ticks. Want to show off something more comprehensive? 4 spaces of indentation gets you there.</p>

<pre><code>.awesome-thing {
    display: block;
    width: 100%;
}
</code></pre>

<h3 id="readyforabreak">Ready for a Break?</h3>

<p>Throw 3 or more dashes down on any new line and you've got yourself a fancy new divider. Aw yeah.</p>

<hr />

<h3 id="advancedusage">Advanced Usage</h3>

<p>There's one fantastic secret about Markdown. If you want, you can write plain old HTML and it'll still work! Very flexible.</p>

<p><input type="text" placeholder="I'm an input field!" /></p>

<p>That should be enough to get you started. Have fun - and let us know what you think :)</p></div>

  <div class="author-box"><img src="/assets/img/author-avatar.png"></img></div>

<div class="row">
  <div class="col-md-6 paddd">
<p><b>Prev</b>&nbsp;
<a href="#">Beautiful</a></p>
</div>
<div class="col-md-6 paddd righted">

  <p>
  <a href="#">Webpage</a>&nbsp;<b>Next</b></p>
</div>
</div>

</section>
@endsection

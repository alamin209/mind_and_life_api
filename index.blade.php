<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>NBI User Dashboard API Docs</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: April 8 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "https://app.tvpfundhk.com";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.4.2.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://app.tvpfundhk.com</code></pre><h1>Authenticating requests</h1>
<p>This API is not authenticated.</p><h1>Advertisement</h1>
<h2>Display List  Advertisement list</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/advertisement/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/advertisement/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "is_google": 0,
            "ad_image_path": "upload\/6080fd0fcdd1b_work_alamin_vai.png",
            "website_link": "www.google.com",
            "status": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-advertisement-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-advertisement-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-advertisement-list"></code></pre>
</div>
<div id="execution-error-GETapi-advertisement-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-advertisement-list"></code></pre>
</div>
<form id="form-GETapi-advertisement-list" data-method="GET" data-path="api/advertisement/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-advertisement-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-advertisement-list" onclick="tryItOut('GETapi-advertisement-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-advertisement-list" onclick="cancelTryOut('GETapi-advertisement-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-advertisement-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/advertisement/list</code></b>
</p>
<p>
<label id="auth-GETapi-advertisement-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-advertisement-list" data-component="header"></label>
</p>
</form><h1>Article</h1>
<h2>Display List  Article list</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/article/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "category_id": 1,
            "title": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            "total_like": 1,
            "total_bookmark": 1,
            "total_share": 2,
            "total_view": 5,
            "post_date": "2021-04-08",
            "image_path": "dfgfd",
            "status": 1,
            "created_at": null,
            "updated_at": null,
            "author": {
                "id": 1,
                "username": "al-amin_hossainmind_life",
                "email": "alamin209209@gmail.com",
                "profile_pic": "https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg",
                "sex": null,
                "industry_id": null,
                "salary_range_id": null,
                "referral_code": null,
                "email_verified_at": "2021-04-01T23:17:42.000000Z",
                "status": 1,
                "created_at": "2021-04-21T06:07:29.000000Z",
                "updated_at": "2021-04-21T06:07:29.000000Z",
                "user_type": "staff"
            },
            "category": {
                "id": 1,
                "name": "Helath1",
                "status": 0,
                "created_at": "2021-04-21T13:27:25.000000Z",
                "updated_at": "2021-04-25T21:12:41.000000Z"
            }
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-article-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-article-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-article-list"></code></pre>
</div>
<div id="execution-error-GETapi-article-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-article-list"></code></pre>
</div>
<form id="form-GETapi-article-list" data-method="GET" data-path="api/article/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-article-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-article-list" onclick="tryItOut('GETapi-article-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-article-list" onclick="cancelTryOut('GETapi-article-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-article-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/article/list</code></b>
</p>
<p>
<label id="auth-GETapi-article-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-article-list" data-component="header"></label>
</p>
</form><h1>Authentication</h1>
<h2>Login User and Create Token</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"penny@gmail.com","password":"12345678"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "penny@gmail.com",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Login Success",
    "code": 200,
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTBhZDIzM2EwYzNjZjhjNTI0NzVkMDU0NTNhZjQ5NWQxNzJmMjBkN2NhMmVlZTExMjcxZTdiOWVkZTMzYTMzMWMwNWNjY2RlNzVkZDgxNWIiLCJpYXQiOjE2MDY3NjM5MjYsIm5iZiI6MTYwNjc2MzkyNiwiZXhwIjoxNjM4Mjk5OTI2LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.WpwcqKxa6b4rrcdP784ISk6iY81k6qPACfqneZDJ2SStHHoKPH59GrXy-CNPgxea4mFuTPkOJXZAcS408A2kgDVZj5V8Li3Da0SN2Iyr2pXUa-M-NGdROTjYKaRFVY_NtAnc9MKKHVxdvUZgSsZHNB1E3NJVrfdyJa7Jntd3-QlkfdamszCyAGhduRPVTcc9nqknc5P-Ak2Yn6UbADXuvqEhvN3BJ_HKEIyjf_pkvjiKQG0aDYyBWOPxmyt60Hko89E2qg4ekVI7URYZ32sV0k-DiVQmamtZGcyy93kxDVJiZU4-iTwjGOO2brZBtnq8oR4SFLdlGtQipx9x0U0BgP_Il4cFBa6VlGWp4hK5PPpNTelrcONRBK2swJtEBa5IH5JsjSzvZTmjgyJ3kYo12dXpaMnJrc995D88MJF1OPJs29T2b5FXKhlAlFOfB0CsTbt5f5kQPjavHUFTH_H1_2Jh47JvRBwIQX0-sGE4J4Qz3h0Iv-DA8_GZZeCmdHcejGYWVx5eW_Mh-qh1yGrb3BziiuLG2GW5wMOqxjxqLG4YyD6CfmHFG6ugF4RRFw3iXhvglwtLqapwSsgdyr5uVWe2LWR5AFd9PpJine980e7hPfg7ilLZwuxuf_tjBLl3UR5PthrKZ5LrDl8KxBTs3vC0VBsQbIOTkSSv9zGP4uI",
        "token_type": "Bearer",
        "expires_at": "2021-11-30 11:18:46"
    }
}</code></pre>
<div id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</div>
<form id="form-POSTapi-auth-login" data-method="POST" data-path="api/auth/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-login" onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-login" onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-auth-login" data-component="body" required  hidden>
<br>
User Password.</p>

</form>
<h2>Get Authenticated User Data</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Data",
    "code": 200,
    "data": {
        "id": 1,
        "username": "pennyyau88",
        "email": "penny@gmail.com",
        "sex": "Male",
        "industry_id": 1,
        "salary_range_id": 1,
        "referral_code": null,
        "profile_pic": "upload\/606ea7dba3d82_images.jpg",
        "created_at": "2021-04-08T04:55:13.000000Z",
        "updated_at": "2021-04-08T06:51:07.000000Z"
    }
}</code></pre>
<div id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-me"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"></code></pre>
</div>
<div id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me"></code></pre>
</div>
<form id="form-GETapi-me" data-method="GET" data-path="api/me" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-me" onclick="tryItOut('GETapi-me');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-me" onclick="cancelTryOut('GETapi-me');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-me" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/me</code></b>
</p>
<p>
<label id="auth-GETapi-me" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-me" data-component="header"></label>
</p>
</form>
<h2>Logout User and Revoke Token</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Logout Success",
    "code": 200,
    "data": []
}</code></pre>
<div id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</div>
<form id="form-POSTapi-logout" data-method="POST" data-path="api/logout" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-logout" onclick="tryItOut('POSTapi-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-logout" onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/logout</code></b>
</p>
<p>
<label id="auth-POSTapi-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-logout" data-component="header"></label>
</p>
</form><h1>Category</h1>
<h2>Display List  Category list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "name": "article category",
            "type": "article",
            "status": 1,
            "created_at": "2021-05-18T12:13:26.000000Z",
            "updated_at": "2021-05-11T12:13:28.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-category-list"></code></pre>
</div>
<form id="form-GETapi-category-list" data-method="GET" data-path="api/category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-category-list" onclick="tryItOut('GETapi-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-category-list" onclick="cancelTryOut('GETapi-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/category/list</code></b>
</p>
</form>
<h2>Display List  Video list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/video-category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/video-category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 2,
            "name": "video category",
            "type": "video",
            "status": 1,
            "created_at": "2021-05-04T12:13:31.000000Z",
            "updated_at": "2021-05-17T12:13:33.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-video-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-video-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-video-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-video-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-video-category-list"></code></pre>
</div>
<form id="form-GETapi-video-category-list" data-method="GET" data-path="api/video-category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-video-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-video-category-list" onclick="tryItOut('GETapi-video-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-video-category-list" onclick="cancelTryOut('GETapi-video-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-video-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/video-category/list</code></b>
</p>
</form><h1>Endpoints</h1>
<h2>Forget Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"penny@gmail.com\n{\"status\":\"Success\",\"message\":\"passwords.sent\",\"code\":201,\"data\":\"\"}"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "penny@gmail.com\n{\"status\":\"Success\",\"message\":\"passwords.sent\",\"code\":201,\"data\":\"\"}"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-POSTapi-password-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-password-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-password-email"></code></pre>
</div>
<div id="execution-error-POSTapi-password-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-password-email"></code></pre>
</div>
<form id="form-POSTapi-password-email" data-method="POST" data-path="api/password/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-password-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-password-email" onclick="tryItOut('POSTapi-password-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-password-email" onclick="cancelTryOut('POSTapi-password-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-password-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/password/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-password-email" data-component="body" required  hidden>
<br>
User Email.</p>

</form>
<h2>Reset Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"penny@gmail.com","token":"quas","password":"12345","password_confirmation":"12345\n{\"status\":\"Success\",\"message\":\"User Created\",\"code\":201,\"data\":{\"id\":14,\"username\":\"penn2yyau88\",\"email\":\"penn1y2@gmail.com\",\"sex\":\"Male\",\"industry_id\":\"1\",\"salary_range_id\":\"1\",\"referral_code\":\"1\",\"profile_pic\":\"upload\\\/606ea8ffe16d4_images.jpg\",\"created_at\":\"2021-04-08T06:55:59.000000Z\",\"updated_at\":\"2021-04-08T06:55:59.000000Z\"}}"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "penny@gmail.com",
    "token": "quas",
    "password": "12345",
    "password_confirmation": "12345\n{\"status\":\"Success\",\"message\":\"User Created\",\"code\":201,\"data\":{\"id\":14,\"username\":\"penn2yyau88\",\"email\":\"penn1y2@gmail.com\",\"sex\":\"Male\",\"industry_id\":\"1\",\"salary_range_id\":\"1\",\"referral_code\":\"1\",\"profile_pic\":\"upload\\\/606ea8ffe16d4_images.jpg\",\"created_at\":\"2021-04-08T06:55:59.000000Z\",\"updated_at\":\"2021-04-08T06:55:59.000000Z\"}}"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-POSTapi-password-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-password-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-password-reset"></code></pre>
</div>
<div id="execution-error-POSTapi-password-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-password-reset"></code></pre>
</div>
<form id="form-POSTapi-password-reset" data-method="POST" data-path="api/password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-password-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-password-reset" onclick="tryItOut('POSTapi-password-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-password-reset" onclick="cancelTryOut('POSTapi-password-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-password-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/password/reset</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-password-reset" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="POSTapi-password-reset" data-component="body" required  hidden>
<br>
the token that was send through Email . e1ba9471d9fe18e88e2fd036254af2c8ab31406c34ac10f0f83d9008d0013b93</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-password-reset" data-component="body" required  hidden>
<br>
the password User Password   User password.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="password_confirmation" data-endpoint="POSTapi-password-reset" data-component="body"  hidden>
<br>
the password that was User  input in password Field.</p>

</form>
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/article" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-POSTapi-article" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-article"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-article"></code></pre>
</div>
<div id="execution-error-POSTapi-article" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-article"></code></pre>
</div>
<form id="form-POSTapi-article" data-method="POST" data-path="api/article" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-article', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-article" onclick="tryItOut('POSTapi-article');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-article" onclick="cancelTryOut('POSTapi-article');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-article" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/article</code></b>
</p>
</form>
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/article/nostrum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article/nostrum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-GETapi-article--article-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-article--article-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-article--article-"></code></pre>
</div>
<div id="execution-error-GETapi-article--article-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-article--article-"></code></pre>
</div>
<form id="form-GETapi-article--article-" data-method="GET" data-path="api/article/{article}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-article--article-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-article--article-" onclick="tryItOut('GETapi-article--article-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-article--article-" onclick="cancelTryOut('GETapi-article--article-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-article--article-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/article/{article}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>article</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="article" data-endpoint="GETapi-article--article-" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://app.tvpfundhk.com/api/article/ad" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article/ad"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-PUTapi-article--article-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-article--article-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-article--article-"></code></pre>
</div>
<div id="execution-error-PUTapi-article--article-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-article--article-"></code></pre>
</div>
<form id="form-PUTapi-article--article-" data-method="PUT" data-path="api/article/{article}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-article--article-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-article--article-" onclick="tryItOut('PUTapi-article--article-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-article--article-" onclick="cancelTryOut('PUTapi-article--article-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-article--article-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/article/{article}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/article/{article}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>article</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="article" data-endpoint="PUTapi-article--article-" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://app.tvpfundhk.com/api/article/consequuntur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article/consequuntur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-DELETEapi-article--article-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-article--article-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-article--article-"></code></pre>
</div>
<div id="execution-error-DELETEapi-article--article-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-article--article-"></code></pre>
</div>
<form id="form-DELETEapi-article--article-" data-method="DELETE" data-path="api/article/{article}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-article--article-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-article--article-" onclick="tryItOut('DELETEapi-article--article-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-article--article-" onclick="cancelTryOut('DELETEapi-article--article-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-article--article-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/article/{article}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>article</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="article" data-endpoint="DELETEapi-article--article-" data-component="url" required  hidden>
<br>
</p>
</form>
<h2>api/verified-only</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/verified-only" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/verified-only"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Error",
    "message": "Unauthenticated.",
    "code": 401,
    "errors": []
}</code></pre>
<div id="execution-results-GETapi-verified-only" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-verified-only"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-verified-only"></code></pre>
</div>
<div id="execution-error-GETapi-verified-only" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-verified-only"></code></pre>
</div>
<form id="form-GETapi-verified-only" data-method="GET" data-path="api/verified-only" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-verified-only', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-verified-only" onclick="tryItOut('GETapi-verified-only');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-verified-only" onclick="cancelTryOut('GETapi-verified-only');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-verified-only" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/verified-only</code></b>
</p>
</form><h1>Industry</h1>
<h2>Display List  Industry list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/industry/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "name": "test 1",
            "status": 1,
            "created_at": "2021-04-12T08:54:09.000000Z",
            "updated_at": "2021-04-15T08:57:32.000000Z"
        },
        {
            "id": 2,
            "name": "test2",
            "status": 1,
            "created_at": "2021-04-12T08:57:26.000000Z",
            "updated_at": "2021-04-21T08:57:36.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-industry-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-industry-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-industry-list"></code></pre>
</div>
<div id="execution-error-GETapi-industry-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-industry-list"></code></pre>
</div>
<form id="form-GETapi-industry-list" data-method="GET" data-path="api/industry/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-industry-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-industry-list" onclick="tryItOut('GETapi-industry-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-industry-list" onclick="cancelTryOut('GETapi-industry-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-industry-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/industry/list</code></b>
</p>
</form>
<h2>Display All  Industry list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/industry" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "name": "test 1",
            "status": 1,
            "created_at": "2021-04-12T08:54:09.000000Z",
            "updated_at": "2021-04-15T08:57:32.000000Z"
        },
        {
            "id": 2,
            "name": "test2",
            "status": 1,
            "created_at": "2021-04-12T08:57:26.000000Z",
            "updated_at": "2021-04-21T08:57:36.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-industry" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-industry"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-industry"></code></pre>
</div>
<div id="execution-error-GETapi-industry" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-industry"></code></pre>
</div>
<form id="form-GETapi-industry" data-method="GET" data-path="api/industry" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-industry', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-industry" onclick="tryItOut('GETapi-industry');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-industry" onclick="cancelTryOut('GETapi-industry');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-industry" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/industry</code></b>
</p>
</form>
<h2>Create new Industry</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/industry" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Test1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Test1"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_created",
    "code": 200,
    "data": {
        "name": "test",
        "status": 1,
        "updated_at": "2021-04-20T23:17:29.000000Z",
        "created_at": "2021-04-20T23:17:29.000000Z",
        "id": 1
    }
}</code></pre>
<div id="execution-results-POSTapi-industry" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-industry"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-industry"></code></pre>
</div>
<div id="execution-error-POSTapi-industry" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-industry"></code></pre>
</div>
<form id="form-POSTapi-industry" data-method="POST" data-path="api/industry" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-industry', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-industry" onclick="tryItOut('POSTapi-industry');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-industry" onclick="cancelTryOut('POSTapi-industry');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-industry" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/industry</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-industry" data-component="body" required  hidden>
<br>
name.</p>

</form>
<h2>Display the specified Industry</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/industry/nobis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry/nobis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_created",
    "code": 200,
    "data": {
        "name": "test",
        "status": 1,
        "updated_at": "2021-04-20T23:17:29.000000Z",
        "created_at": "2021-04-20T23:17:29.000000Z",
        "id": 1
    }
}</code></pre>
<div id="execution-results-GETapi-industry--industry-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-industry--industry-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-industry--industry-"></code></pre>
</div>
<div id="execution-error-GETapi-industry--industry-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-industry--industry-"></code></pre>
</div>
<form id="form-GETapi-industry--industry-" data-method="GET" data-path="api/industry/{industry}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-industry--industry-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-industry--industry-" onclick="tryItOut('GETapi-industry--industry-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-industry--industry-" onclick="cancelTryOut('GETapi-industry--industry-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-industry--industry-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/industry/{industry}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>industry</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="industry" data-endpoint="GETapi-industry--industry-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-industry--industry-" data-component="url" required  hidden>
<br>
Id of Reference.</p>
</form>
<h2>Update the specified Industry</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://app.tvpfundhk.com/api/industry/est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"test1","status":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "test1",
    "status": "1"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_update",
    "code": 201,
    "data": {
        "id": 1,
        "name": "werew",
        "status": "1",
        "created_at": "2021-04-20T23:17:29.000000Z",
        "updated_at": "2021-04-20T23:21:54.000000Z"
    }
}</code></pre>
<div id="execution-results-PUTapi-industry--industry-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-industry--industry-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-industry--industry-"></code></pre>
</div>
<div id="execution-error-PUTapi-industry--industry-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-industry--industry-"></code></pre>
</div>
<form id="form-PUTapi-industry--industry-" data-method="PUT" data-path="api/industry/{industry}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-industry--industry-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-industry--industry-" onclick="tryItOut('PUTapi-industry--industry-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-industry--industry-" onclick="cancelTryOut('PUTapi-industry--industry-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-industry--industry-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/industry/{industry}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/industry/{industry}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>industry</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="industry" data-endpoint="PUTapi-industry--industry-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-industry--industry-" data-component="url" required  hidden>
<br>
Id of Reference.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-industry--industry-" data-component="body" required  hidden>
<br>
User Name.</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="status" data-endpoint="PUTapi-industry--industry-" data-component="body" required  hidden>
<br>
User Name.</p>

</form><h1>Password Change</h1>
<h2>Change Password</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/change-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"current_password":"12345678","password":"12345678","confirm_password":"12345678"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/change-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "12345678",
    "password": "12345678",
    "confirm_password": "12345678"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Password Changed",
    "code": 200,
    "data": []
}</code></pre>
<div id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password"></code></pre>
</div>
<form id="form-POSTapi-change-password" data-method="POST" data-path="api/change-password" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-change-password" onclick="tryItOut('POSTapi-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-change-password" onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/change-password</code></b>
</p>
<p>
<label id="auth-POSTapi-change-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-change-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>current_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="current_password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
User Current Password.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
new password.</p>
<p>
<b><code>confirm_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="confirm_password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
new password confirmation.</p>

</form><h1>Salary</h1>
<h2>Display List  Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/salary/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "salary_range": "HKD0-HKD10000",
            "status": 1,
            "created_at": "2021-04-07T04:47:45.000000Z",
            "updated_at": "2021-04-20T04:47:47.000000Z"
        },
        {
            "id": 2,
            "salary_range": "HKD10000-HKD20000",
            "status": 1,
            "created_at": "2021-04-07T04:47:49.000000Z",
            "updated_at": "2021-04-12T04:47:51.000000Z"
        },
        {
            "id": 3,
            "salary_range": "HKD30000-HKD50000",
            "status": 1,
            "created_at": "2021-04-06T04:47:52.000000Z",
            "updated_at": "2021-04-12T04:47:56.000000Z"
        },
        {
            "id": 4,
            "salary_range": "HKD50000-HKD100000",
            "status": 1,
            "created_at": "2021-04-20T04:47:57.000000Z",
            "updated_at": "2021-04-06T04:47:54.000000Z"
        },
        {
            "id": 5,
            "salary_range": "HKD100000",
            "status": 1,
            "created_at": "2021-04-19T04:48:01.000000Z",
            "updated_at": "2021-04-13T04:47:59.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-salary-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-salary-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-salary-list"></code></pre>
</div>
<div id="execution-error-GETapi-salary-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-salary-list"></code></pre>
</div>
<form id="form-GETapi-salary-list" data-method="GET" data-path="api/salary/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-salary-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-salary-list" onclick="tryItOut('GETapi-salary-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-salary-list" onclick="cancelTryOut('GETapi-salary-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-salary-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/salary/list</code></b>
</p>
</form>
<h2>Display all  Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/salary" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "salary_range": "HKD0-HKD10000",
            "status": 1,
            "created_at": "2021-04-07T04:47:45.000000Z",
            "updated_at": "2021-04-20T04:47:47.000000Z"
        },
        {
            "id": 2,
            "salary_range": "HKD10000-HKD20000",
            "status": 1,
            "created_at": "2021-04-07T04:47:49.000000Z",
            "updated_at": "2021-04-12T04:47:51.000000Z"
        },
        {
            "id": 3,
            "salary_range": "HKD30000-HKD50000",
            "status": 1,
            "created_at": "2021-04-06T04:47:52.000000Z",
            "updated_at": "2021-04-12T04:47:56.000000Z"
        },
        {
            "id": 4,
            "salary_range": "HKD50000-HKD100000",
            "status": 1,
            "created_at": "2021-04-20T04:47:57.000000Z",
            "updated_at": "2021-04-06T04:47:54.000000Z"
        },
        {
            "id": 5,
            "salary_range": "HKD100000",
            "status": 1,
            "created_at": "2021-04-19T04:48:01.000000Z",
            "updated_at": "2021-04-13T04:47:59.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-salary" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-salary"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-salary"></code></pre>
</div>
<div id="execution-error-GETapi-salary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-salary"></code></pre>
</div>
<form id="form-GETapi-salary" data-method="GET" data-path="api/salary" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-salary', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-salary" onclick="tryItOut('GETapi-salary');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-salary" onclick="cancelTryOut('GETapi-salary');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-salary" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/salary</code></b>
</p>
</form>
<h2>Create new Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/salary" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"salary_range":"HKD0-HKD10000"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "salary_range": "HKD0-HKD10000"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_created",
    "code": 200,
    "data": {
        "salary_range": "HKD0-HKD10000",
        "status": 1,
        "updated_at": "2021-04-20T22:25:36.000000Z",
        "created_at": "2021-04-20T22:25:36.000000Z",
        "id": 1
    }
}</code></pre>
<div id="execution-results-POSTapi-salary" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-salary"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-salary"></code></pre>
</div>
<div id="execution-error-POSTapi-salary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-salary"></code></pre>
</div>
<form id="form-POSTapi-salary" data-method="POST" data-path="api/salary" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-salary', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-salary" onclick="tryItOut('POSTapi-salary');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-salary" onclick="cancelTryOut('POSTapi-salary');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-salary" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/salary</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>salary_range</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary_range" data-endpoint="POSTapi-salary" data-component="body" required  hidden>
<br>
Salary Range.</p>

</form>
<h2>Display the specified Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/salary/odio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary/odio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "Salary Data Fund",
    "code": 200,
    "data": {
        "id": 1,
        "salary_range": "HKD0-HKD10000",
        "status": 1,
        "created_at": "2021-04-20T22:25:36.000000Z",
        "updated_at": "2021-04-20T22:25:36.000000Z"
    }
}</code></pre>
<div id="execution-results-GETapi-salary--salary-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-salary--salary-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-salary--salary-"></code></pre>
</div>
<div id="execution-error-GETapi-salary--salary-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-salary--salary-"></code></pre>
</div>
<form id="form-GETapi-salary--salary-" data-method="GET" data-path="api/salary/{salary}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-salary--salary-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-salary--salary-" onclick="tryItOut('GETapi-salary--salary-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-salary--salary-" onclick="cancelTryOut('GETapi-salary--salary-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-salary--salary-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/salary/{salary}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>salary</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary" data-endpoint="GETapi-salary--salary-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-salary--salary-" data-component="url" required  hidden>
<br>
Id of Reference.</p>
</form>
<h2>Update the specified Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://app.tvpfundhk.com/api/salary/inventore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"salary_range":"HKD0-HKD10000","status":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary/inventore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "salary_range": "HKD0-HKD10000",
    "status": "1"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_update",
    "code": 201,
    "data": {
        "id": 1,
        "salary_range": "HKD100-HKD10000",
        "status": "1",
        "created_at": "2021-04-20T22:25:36.000000Z",
        "updated_at": "2021-04-20T22:29:15.000000Z"
    }
}</code></pre>
<div id="execution-results-PUTapi-salary--salary-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-salary--salary-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-salary--salary-"></code></pre>
</div>
<div id="execution-error-PUTapi-salary--salary-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-salary--salary-"></code></pre>
</div>
<form id="form-PUTapi-salary--salary-" data-method="PUT" data-path="api/salary/{salary}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-salary--salary-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-salary--salary-" onclick="tryItOut('PUTapi-salary--salary-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-salary--salary-" onclick="cancelTryOut('PUTapi-salary--salary-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-salary--salary-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/salary/{salary}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/salary/{salary}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>salary</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary" data-endpoint="PUTapi-salary--salary-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-salary--salary-" data-component="url" required  hidden>
<br>
Id of Reference.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>salary_range</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary_range" data-endpoint="PUTapi-salary--salary-" data-component="body" required  hidden>
<br>
User Name.</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="status" data-endpoint="PUTapi-salary--salary-" data-component="body" required  hidden>
<br>
User Name.</p>

</form>
<h2>Remove Specific the specified Salary range</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://app.tvpfundhk.com/api/salary/unde" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/salary/unde"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_delete",
    "code": 200,
    "data": []
}</code></pre>
<div id="execution-results-DELETEapi-salary--salary-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-salary--salary-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-salary--salary-"></code></pre>
</div>
<div id="execution-error-DELETEapi-salary--salary-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-salary--salary-"></code></pre>
</div>
<form id="form-DELETEapi-salary--salary-" data-method="DELETE" data-path="api/salary/{salary}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-salary--salary-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-salary--salary-" onclick="tryItOut('DELETEapi-salary--salary-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-salary--salary-" onclick="cancelTryOut('DELETEapi-salary--salary-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-salary--salary-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/salary/{salary}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>salary</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary" data-endpoint="DELETEapi-salary--salary-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-salary--salary-" data-component="url" required  hidden>
<br>
Id of salary table.</p>
</form>
<h2>Remove Specific the specified Industry</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://app.tvpfundhk.com/api/industry/tempora" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/industry/tempora"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_delete",
    "code": 200,
    "data": []
}</code></pre>
<div id="execution-results-DELETEapi-industry--industry-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-industry--industry-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-industry--industry-"></code></pre>
</div>
<div id="execution-error-DELETEapi-industry--industry-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-industry--industry-"></code></pre>
</div>
<form id="form-DELETEapi-industry--industry-" data-method="DELETE" data-path="api/industry/{industry}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-industry--industry-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-industry--industry-" onclick="tryItOut('DELETEapi-industry--industry-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-industry--industry-" onclick="cancelTryOut('DELETEapi-industry--industry-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-industry--industry-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/industry/{industry}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>industry</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="industry" data-endpoint="DELETEapi-industry--industry-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-industry--industry-" data-component="url" required  hidden>
<br>
Id of salary table.</p>
</form><h1>User Advertise Log</h1>
<h2>Create New User Advertise  Log</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/advertisement-log" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"1","advertisement_id":"1","user_click":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/advertisement-log"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "1",
    "advertisement_id": "1",
    "user_click": "1"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User advertisement Count Successfully ",
    "code": 201,
    "data": {
        "id": 1,
        "username": "alamin",
        "email": "alamin@gmail.com",
        "sex": "Male",
        "industry_id": "1",
        "salary_range_id": "1",
        "referral_code": "2023",
        "access_token": {
            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjRmMDFiZTkzMmMzYTRjZmZkODEzYTdlYjUyNTVmYWY4NDZhODFkY2M0YjM2M2YwOWY4YjBjNGYyNDhlM2M0YzAxZWE5MjIyOTI5YmNiMzUiLCJpYXQiOiIxNjE4MjYwNjU2LjgxMDg4MiIsIm5iZiI6IjE2MTgyNjA2NTYuODEwODg1IiwiZXhwIjoiMTYxODM0NzA1Ni42NTg2MTQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.j7M_KXyMJMIK2yRgVNSMggUZVIOjF3XU6MVqzisKrixDBTMapQpWkW0L5VQZF20MRjKjgjBfYVxQJyMrbSA-fRPZWm3NhtUaYhGEH_rBEFLV5TDnBH2aZ8uaFt4Vud4fIplyqKKzLkASUzNK-OJSTE9qR0tIRSt08AwuOTGxmdp4e5kSDZdYp0nwSag00khOeJeamCbAmM514Xtv7qtYVzS2kUvUsH3bVNqJA0fvuD0Yx3Jc6kFY8EIdVKzNfiIT44RG0DUIh7lxGKEF9SAd-hn5IB30WaxPB6XgvNtLuNRKidsQEN7FcZA-dOy14v74D1W78z7ZNq4CInLndWOcuBwXQvwNtNGK2dSHtrnZpy__V7X25BdUUQd8EN1oz-YF0B_HilO_kSbElYaA0jg-XMXQLCnHH59B1t7Yl49O2i3F8I9rqWxN4--KGvhzzQSFj_zXySqwXx6gg4TIpASm3ciFkQnhq6fOjsTmsp-4dwBK7W88Ey6JGmwPeTyPi5vucwBTG11xB0pNo4MCQ-G5Yx-5ApKy_FeY1hg2csBLOZR2Z6vXJvQ8id1XksbQwTJWOjlFskmbt_cqnLnvkCq6ZBiH-N2igCsSKQvS-JHI6Sl7Co-FnNpIbURnrKBX8WNsncHQ2-CSHw4PLsKo61zEZdoEVZURZSACNJXeqvbqGJU",
            "token_type": "Bearer",
            "expires_at": "2021-04-13 20:50:56"
        },
        "profile_pic": "public\/upload\/6074b2b0be1a4_1611049331368.JPEG",
        "created_at": "2021-04-12T20:50:56.000000Z",
        "updated_at": "2021-04-12T20:50:56.000000Z"
    }
}</code></pre>
<div id="execution-results-POSTapi-advertisement-log" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-advertisement-log"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-advertisement-log"></code></pre>
</div>
<div id="execution-error-POSTapi-advertisement-log" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-advertisement-log"></code></pre>
</div>
<form id="form-POSTapi-advertisement-log" data-method="POST" data-path="api/advertisement-log" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-advertisement-log', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-advertisement-log" onclick="tryItOut('POSTapi-advertisement-log');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-advertisement-log" onclick="cancelTryOut('POSTapi-advertisement-log');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-advertisement-log" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/advertisement-log</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-advertisement-log" data-component="body" required  hidden>
<br>
User Id.</p>
<p>
<b><code>advertisement_id</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="advertisement_id" data-endpoint="POSTapi-advertisement-log" data-component="body" required  hidden>
<br>
Advertisement Id.</p>
<p>
<b><code>user_click</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="user_click" data-endpoint="POSTapi-advertisement-log" data-component="body" required  hidden>
<br>
Click .</p>

</form><h1>User Article Log</h1>
<h2>Display List User Article Log</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/article-user-log/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article-user-log/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "article_id": 1,
            "user_like": 1,
            "user_bookmark": 1,
            "created_at": "2021-04-21T22:35:20.000000Z",
            "updated_at": "2021-04-15T22:35:22.000000Z",
            "user": {
                "id": 1,
                "username": "al-amin_hossainmind_life",
                "email": "alamin209209@gmail.com",
                "profile_pic": "https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg",
                "sex": null,
                "industry_id": null,
                "salary_range_id": null,
                "referral_code": null,
                "email_verified_at": "2021-04-01T23:17:42.000000Z",
                "status": 1,
                "created_at": "2021-04-21T06:07:29.000000Z",
                "updated_at": "2021-04-21T06:07:29.000000Z",
                "user_type": "staff"
            },
            "article": {
                "id": 1,
                "user_id": 1,
                "category_id": 1,
                "title": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
                "total_like": 1,
                "total_bookmark": 1,
                "total_share": 2,
                "total_view": 5,
                "post_date": "2021-04-08",
                "image_path": "dfgfd",
                "status": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-article-user-log-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-article-user-log-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-article-user-log-list"></code></pre>
</div>
<div id="execution-error-GETapi-article-user-log-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-article-user-log-list"></code></pre>
</div>
<form id="form-GETapi-article-user-log-list" data-method="GET" data-path="api/article-user-log/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-article-user-log-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-article-user-log-list" onclick="tryItOut('GETapi-article-user-log-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-article-user-log-list" onclick="cancelTryOut('GETapi-article-user-log-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-article-user-log-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/article-user-log/list</code></b>
</p>
<p>
<label id="auth-GETapi-article-user-log-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-article-user-log-list" data-component="header"></label>
</p>
</form>
<h2>Create New User Article Log</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/article-user-log/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"1","article_id":"1","user_like":"1","user_bookmark":"1","user_share":"1","user_view":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/article-user-log/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "1",
    "article_id": "1",
    "user_like": "1",
    "user_bookmark": "1",
    "user_share": "1",
    "user_view": "1"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Created",
    "code": 201,
    "data": {
        "id": 1,
        "username": "alamin",
        "email": "alamin@gmail.com",
        "sex": "Male",
        "industry_id": "1",
        "salary_range_id": "1",
        "referral_code": "2023",
        "access_token": {
            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjRmMDFiZTkzMmMzYTRjZmZkODEzYTdlYjUyNTVmYWY4NDZhODFkY2M0YjM2M2YwOWY4YjBjNGYyNDhlM2M0YzAxZWE5MjIyOTI5YmNiMzUiLCJpYXQiOiIxNjE4MjYwNjU2LjgxMDg4MiIsIm5iZiI6IjE2MTgyNjA2NTYuODEwODg1IiwiZXhwIjoiMTYxODM0NzA1Ni42NTg2MTQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.j7M_KXyMJMIK2yRgVNSMggUZVIOjF3XU6MVqzisKrixDBTMapQpWkW0L5VQZF20MRjKjgjBfYVxQJyMrbSA-fRPZWm3NhtUaYhGEH_rBEFLV5TDnBH2aZ8uaFt4Vud4fIplyqKKzLkASUzNK-OJSTE9qR0tIRSt08AwuOTGxmdp4e5kSDZdYp0nwSag00khOeJeamCbAmM514Xtv7qtYVzS2kUvUsH3bVNqJA0fvuD0Yx3Jc6kFY8EIdVKzNfiIT44RG0DUIh7lxGKEF9SAd-hn5IB30WaxPB6XgvNtLuNRKidsQEN7FcZA-dOy14v74D1W78z7ZNq4CInLndWOcuBwXQvwNtNGK2dSHtrnZpy__V7X25BdUUQd8EN1oz-YF0B_HilO_kSbElYaA0jg-XMXQLCnHH59B1t7Yl49O2i3F8I9rqWxN4--KGvhzzQSFj_zXySqwXx6gg4TIpASm3ciFkQnhq6fOjsTmsp-4dwBK7W88Ey6JGmwPeTyPi5vucwBTG11xB0pNo4MCQ-G5Yx-5ApKy_FeY1hg2csBLOZR2Z6vXJvQ8id1XksbQwTJWOjlFskmbt_cqnLnvkCq6ZBiH-N2igCsSKQvS-JHI6Sl7Co-FnNpIbURnrKBX8WNsncHQ2-CSHw4PLsKo61zEZdoEVZURZSACNJXeqvbqGJU",
            "token_type": "Bearer",
            "expires_at": "2021-04-13 20:50:56"
        },
        "profile_pic": "public\/upload\/6074b2b0be1a4_1611049331368.JPEG",
        "created_at": "2021-04-12T20:50:56.000000Z",
        "updated_at": "2021-04-12T20:50:56.000000Z"
    }
}</code></pre>
<div id="execution-results-POSTapi-article-user-log-store" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-article-user-log-store"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-article-user-log-store"></code></pre>
</div>
<div id="execution-error-POSTapi-article-user-log-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-article-user-log-store"></code></pre>
</div>
<form id="form-POSTapi-article-user-log-store" data-method="POST" data-path="api/article-user-log/store" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-article-user-log-store', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-article-user-log-store" onclick="tryItOut('POSTapi-article-user-log-store');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-article-user-log-store" onclick="cancelTryOut('POSTapi-article-user-log-store');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-article-user-log-store" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/article-user-log/store</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-article-user-log-store" data-component="body" required  hidden>
<br>
User Id.</p>
<p>
<b><code>article_id</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="article_id" data-endpoint="POSTapi-article-user-log-store" data-component="body" required  hidden>
<br>
Article Id.</p>
<p>
<b><code>user_like</code></b>&nbsp;&nbsp;<small>Integer</small>     <i>optional</i> &nbsp;
<input type="text" name="user_like" data-endpoint="POSTapi-article-user-log-store" data-component="body"  hidden>
<br>
optional  The article that like by the user.</p>
<p>
<b><code>user_bookmark</code></b>&nbsp;&nbsp;<small>Integer</small>     <i>optional</i> &nbsp;
<input type="text" name="user_bookmark" data-endpoint="POSTapi-article-user-log-store" data-component="body"  hidden>
<br>
optional  The article that Bookmark by the user.</p>
<p>
<b><code>user_share</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="user_share" data-endpoint="POSTapi-article-user-log-store" data-component="body" required  hidden>
<br>
The article that share by the user.</p>
<p>
<b><code>user_view</code></b>&nbsp;&nbsp;<small>Integer</small>  &nbsp;
<input type="text" name="user_view" data-endpoint="POSTapi-article-user-log-store" data-component="body" required  hidden>
<br>
The article that share by the user.</p>

</form><h1>User Management</h1>
<h2>User List.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/users?limit=19" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/users"
);

let params = {
    "limit": "19",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Error",
    "message": "Unauthenticated.",
    "code": 401,
    "errors": []
}</code></pre>
<div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET" data-path="api/users" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users" onclick="tryItOut('GETapi-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users" onclick="cancelTryOut('GETapi-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users</code></b>
</p>
<p>
<label id="auth-GETapi-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-users" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="limit" data-endpoint="GETapi-users" data-component="query"  hidden>
<br>
optional Data Per Page Limit. Example : 10</p>
</form>
<h2>Display the specified user.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/users/3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/users/3"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Data",
    "code": 200,
    "data": {
        "id": 12,
        "name": "pennyyau88",
        "email": "pennyyau88@gmail.com",
        "phone": "01849699001",
        "address": "20, Nur Graden City",
        "country": "Bangladesh",
        "country_id": 15,
        "state": null,
        "state_id": 0,
        "zip": "1230",
        "created_at": "2021-01-26T17:47:52.000000Z",
        "updated_at": "2021-01-26T17:47:52.000000Z"
    }
}</code></pre>
<div id="execution-results-GETapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--user-"></code></pre>
</div>
<form id="form-GETapi-users--user-" data-method="GET" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--user-" onclick="tryItOut('GETapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--user-" onclick="cancelTryOut('GETapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-GETapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-users--user-" data-component="url" required  hidden>
<br>
User ID. Example : 5</p>
</form>
<h2>Update User</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://app.tvpfundhk.com/api/users/5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"pennyyau88","email":"penny@gmail.com","sex":"Male","password":"12345678","password_confirmation":"12345678","industry_id":1,"salary_range_id":1,"referral_code":1,"profile_pic":"profile.png"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/users/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "pennyyau88",
    "email": "penny@gmail.com",
    "sex": "Male",
    "password": "12345678",
    "password_confirmation": "12345678",
    "industry_id": 1,
    "salary_range_id": 1,
    "referral_code": 1,
    "profile_pic": "profile.png"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Updated",
    "code": 201,
    "data": {
        "id": 12,
        "name": "pennyyau88",
        "email": "pennyyau88@gmail.com",
        "phone": "01849699001",
        "address": "20, Nur Graden City",
        "country": "Bangladesh",
        "country_id": 15,
        "state": null,
        "state_id": 0,
        "zip": 120,
        "created_at": "2021-01-26T17:47:52.000000Z",
        "updated_at": "2021-01-26T17:49:57.000000Z"
    }
}</code></pre>
<div id="execution-results-PUTapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--user-"></code></pre>
</div>
<form id="form-PUTapi-users--user-" data-method="PUT" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-users--user-" onclick="tryItOut('PUTapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-users--user-" onclick="cancelTryOut('PUTapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-PUTapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-users--user-" data-component="url" required  hidden>
<br>
User id.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User Name.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>sex</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sex" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User sex.(There will be Male,Female two option will be available )</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User Password.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password_confirmation" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User Password Confirmation.</p>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="industry_id" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User industry id.</p>
<p>
<b><code>salary_range_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="salary_range_id" data-endpoint="PUTapi-users--user-" data-component="body" required  hidden>
<br>
User industry id.</p>
<p>
<b><code>referral_code</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="referral_code" data-endpoint="PUTapi-users--user-" data-component="body"  hidden>
<br>
optional  User referral_code.</p>
<p>
<b><code>profile_pic</code></b>&nbsp;&nbsp;<small>string/file</small>     <i>optional</i> &nbsp;
<input type="text" name="profile_pic" data-endpoint="PUTapi-users--user-" data-component="body"  hidden>
<br>
optional User profile picture.</p>

</form>
<h2>Remove the specified User.</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://app.tvpfundhk.com/api/users/4" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/users/4"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Deleted",
    "code": 200,
    "data": []
}</code></pre>
<div id="execution-results-DELETEapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--user-"></code></pre>
</div>
<form id="form-DELETEapi-users--user-" data-method="DELETE" data-path="api/users/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-users--user-" onclick="tryItOut('DELETEapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-users--user-" onclick="cancelTryOut('DELETEapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<label id="auth-DELETEapi-users--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-users--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-users--user-" data-component="url" required  hidden>
<br>
User ID. Example : 5</p>
</form>
<h2>Create New User</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://app.tvpfundhk.com/api/user/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"username":"pennyyau88","email":"penny@gmail.com","sex":"Male","password":"12345678","password_confirmation":"12345678","industry_id":1,"salary_range_id":1,"referral_code":1,"profile_pic":"profile.png"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/user/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "pennyyau88",
    "email": "penny@gmail.com",
    "sex": "Male",
    "password": "12345678",
    "password_confirmation": "12345678",
    "industry_id": 1,
    "salary_range_id": 1,
    "referral_code": 1,
    "profile_pic": "profile.png"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "User Data",
    "code": 200,
    "data": {
        "id": 14,
        "username": "penn2yyau88",
        "email": "penn1y2@gmail.com",
        "sex": "Male",
        "industry_id": 1,
        "salary_range_id": 1,
        "referral_code": "1",
        "profile_pic": "upload\/606ea8ffe16d4_images.jpg",
        "created_at": "2021-04-08T06:55:59.000000Z",
        "updated_at": "2021-04-08T06:55:59.000000Z"
    }
}</code></pre>
<div id="execution-results-POSTapi-user-store" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-store"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-store"></code></pre>
</div>
<div id="execution-error-POSTapi-user-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-store"></code></pre>
</div>
<form id="form-POSTapi-user-store" data-method="POST" data-path="api/user/store" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-store', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-store" onclick="tryItOut('POSTapi-user-store');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-store" onclick="cancelTryOut('POSTapi-user-store');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-store" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/store</code></b>
</p>
<p>
<label id="auth-POSTapi-user-store" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-store" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User Name.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User Email.</p>
<p>
<b><code>sex</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sex" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User sex.(There will be Male,Female two option will be available )</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User Password.</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password_confirmation" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User Password Confirmation.</p>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="industry_id" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User industry id.</p>
<p>
<b><code>salary_range_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="salary_range_id" data-endpoint="POSTapi-user-store" data-component="body" required  hidden>
<br>
User industry id.</p>
<p>
<b><code>referral_code</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="referral_code" data-endpoint="POSTapi-user-store" data-component="body"  hidden>
<br>
optional  User referral_code.</p>
<p>
<b><code>profile_pic</code></b>&nbsp;&nbsp;<small>string/file</small>     <i>optional</i> &nbsp;
<input type="text" name="profile_pic" data-endpoint="POSTapi-user-store" data-component="body"  hidden>
<br>
optional User profile picture.</p>

</form><h1>User Verification</h1>
<h2>User verification Email</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"penny@gmail.com\n{\"status\":\"Success\",\"message\":\"User Created\",\"code\":201,\"data\":{\"id\":14,\"username\":\"penn2yyau88\",\"email\":\"penn1y2@gmail.com\",\"sex\":\"Male\",\"industry_id\":\"1\",\"salary_range_id\":\"1\",\"referral_code\":\"1\",\"profile_pic\":\"upload\\\/606ea8ffe16d4_images.jpg\",\"created_at\":\"2021-04-08T06:55:59.000000Z\",\"updated_at\":\"2021-04-08T06:55:59.000000Z\"}}"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "penny@gmail.com\n{\"status\":\"Success\",\"message\":\"User Created\",\"code\":201,\"data\":{\"id\":14,\"username\":\"penn2yyau88\",\"email\":\"penn1y2@gmail.com\",\"sex\":\"Male\",\"industry_id\":\"1\",\"salary_range_id\":\"1\",\"referral_code\":\"1\",\"profile_pic\":\"upload\\\/606ea8ffe16d4_images.jpg\",\"created_at\":\"2021-04-08T06:55:59.000000Z\",\"updated_at\":\"2021-04-08T06:55:59.000000Z\"}}"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Error",
    "message": "Unauthenticated.",
    "code": 401,
    "errors": []
}</code></pre>
<div id="execution-results-GETapi-email-resend" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-email-resend"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-email-resend"></code></pre>
</div>
<div id="execution-error-GETapi-email-resend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-email-resend"></code></pre>
</div>
<form id="form-GETapi-email-resend" data-method="GET" data-path="api/email/resend" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-email-resend', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-email-resend" onclick="tryItOut('GETapi-email-resend');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-email-resend" onclick="cancelTryOut('GETapi-email-resend');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-email-resend" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/email/resend</code></b>
</p>
<p>
<label id="auth-GETapi-email-resend" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-email-resend" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>email</small>  &nbsp;
<input type="text" name="email" data-endpoint="GETapi-email-resend" data-component="body" required  hidden>
<br>
User Email.</p>

</form><h1>Video</h1>
<h2>Display List Video  list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://app.tvpfundhk.com/api/videos/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://app.tvpfundhk.com/api/videos/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "Success",
    "message": "messages.success_show_all",
    "code": 200,
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "category_id": 2,
            "type": " video directly",
            "video_path": null,
            "youtube_link": null,
            "status": 1,
            "created_at": null,
            "updated_at": null,
            "author": {
                "id": 1,
                "username": "al-amin_hossainmind_life",
                "email": "alamin209209@gmail.com",
                "profile_pic": "https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg",
                "sex": null,
                "industry_id": null,
                "salary_range_id": null,
                "referral_code": null,
                "email_verified_at": "2021-04-01T23:17:42.000000Z",
                "status": 1,
                "created_at": "2021-04-21T06:07:29.000000Z",
                "updated_at": "2021-04-21T06:07:29.000000Z",
                "user_type": "staff"
            },
            "video_category": {
                "id": 2,
                "name": "video category",
                "type": "video",
                "status": 1,
                "created_at": "2021-05-04T12:13:31.000000Z",
                "updated_at": "2021-05-17T12:13:33.000000Z"
            }
        },
        {
            "id": 2,
            "user_id": 1,
            "category_id": 2,
            "type": "link video",
            "video_path": null,
            "youtube_link": null,
            "status": 1,
            "created_at": null,
            "updated_at": null,
            "author": {
                "id": 1,
                "username": "al-amin_hossainmind_life",
                "email": "alamin209209@gmail.com",
                "profile_pic": "https:\/\/lh5.googleusercontent.com\/-9S33dmSeYgQ\/AAAAAAAAAAI\/AAAAAAAAAAA\/AMZuucnEXYFy3mMQISfBSLntpYIANBF-zw\/s96-c\/photo.jpg",
                "sex": null,
                "industry_id": null,
                "salary_range_id": null,
                "referral_code": null,
                "email_verified_at": "2021-04-01T23:17:42.000000Z",
                "status": 1,
                "created_at": "2021-04-21T06:07:29.000000Z",
                "updated_at": "2021-04-21T06:07:29.000000Z",
                "user_type": "staff"
            },
            "video_category": {
                "id": 2,
                "name": "video category",
                "type": "video",
                "status": 1,
                "created_at": "2021-05-04T12:13:31.000000Z",
                "updated_at": "2021-05-17T12:13:33.000000Z"
            }
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-videos-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-videos-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-videos-list"></code></pre>
</div>
<div id="execution-error-GETapi-videos-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-videos-list"></code></pre>
</div>
<form id="form-GETapi-videos-list" data-method="GET" data-path="api/videos/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-videos-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-videos-list" onclick="tryItOut('GETapi-videos-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-videos-list" onclick="cancelTryOut('GETapi-videos-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-videos-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/videos/list</code></b>
</p>
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript"];
        setupLanguages(languages);
    });
</script>
</body>
</html>

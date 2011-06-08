Yiit (Yes it is, too)
==============

Description
------------------
Yiit packages commonly used features in modern web applications into a Yii Project. Somewhere down the road i also plan to release it as Netbeans plugin.

Features
------------------
* .htaccess
	* Redirects non-www to www domain. Rule is generic so you don't need to customize it.
	* Supports Pretty URLs
	* Supports YII_ENVIRONMENT variable. Ideally this should be the place where you should change YII_ENVIRONMENT but you can always override it in index.php
* Support for Multiple Environment is enabled, (Thanks to [this](http://www.yiiframework.com/wiki/73) and [this](http://www.yiiframework.com/wiki/73/#c34)).
	* Config is broken on per environment basis inside protected/config with main.php containing generic settings, later overridden by environment specific config file.
	* main
		* Added yiilite path which can be enabled depending on requirements. Some people think this is environment specific, my observation differs.
		* enableCsrfValdation and enableCookieValidation set for request component
		* allowAutoLogin and loginUrl set for user component
		* Path format urls enabled
		* For application you have the choice to use a single db e.g. "db" or multiple such as Auth, Session etc.
		* AuthManager is enabled and under default config uses "db" as connectionID.
		* Cache is enabled using CDummyCache as default, but can uncomment CMemcache
		* logsEmail and staticContentDomain params are defined. Details inside config file.
	* mode_development
		* Debug enabled with traceLevel as 3
		* Gii is enabled with password password.
		* Db configurations have overridden parameters along with Profiling and ParamLogging enabled.
		* Logging
			* FileLogging enabled for error, warning, trace and info.
			* WebLogging enabled for same levels as above.
	* mode_production
		* Debug disabled with traceLevel as 0
		* Db configuration have overridden parameters and contains logDB definition
		* PHP-IDS([link](http://www.yiiframework.com/extension/phpids/)) is enabled
		* Logging
			* FileLogging same as development mode
			* EmailLog for error and warning levels
			* Optional database logging to logDB for error and warning levels is configured but commented
	* mode_stage
		* Debug enabled with traceLevel as 0
		* Db configurations overridden
		* FileLogging enabled for error, warning, trace and info Levels
	* mode_test
		* Debug disabled with traceLevel as 0
		* Db configurations overridden
		* Logging same as mode_development
		* Configured fixture
* Meta Tags
	* Added support for meta tags and link tags (Thanks to [this](http://www.yiiframework.com/wiki/54/))
	* Class files located at protected/components, called ExtendedController and ParentController
	* Extend your controllers from ParentController
	* SiteController contains examples on how to set meta, controller level, action level and combined
	* Custom component class also contains some documentation that could be useful
* Added default deny rule in ParentController (Thanks to [this](http://www.yiiframework.com/wiki/169/configuring-controller-access-rules-to-default-deny/))
* Created a theme out of default view files

How to use?
---------------------
* To benefit from all the features described above, extend your controllers from ParentController instead if Controller or CController

Permissions
---------------------
* Following directories should be writable by webserver
	* assets
	* protected/runtime
	* protected/components/ids/IDS/tmp

Bundled software
================
* [yii-1.1.7.r3135](http://www.yiiframework.com/download/)
* [php-ids 0.2](http://www.yiiframework.com/extension/phpids/)

Feature Improvements
====================
* Add a user component(Current consideration is [YiiUser](http://code.google.com/p/yii-user)), waiting for developer to add support for creating roles, setting up permissions and assigning roles for admin users, might contribute it.
* Add S3 CDN Extension(Current consideration is [es3](http://www.yiiframework.com/extension/es3/))
* Add [Email](http://www.yiiframework.com/extension/email/) extension
* Add a decent Paypal extension
* Add a decent openid extension
* Copy current theme as theme_name-minified, minify css and js and use that. Add minifer script in project. (Any suggestion which one to use?)

Feature Requests/Contact/Feedback
=================================
* You can contact me at shoaib[AT|NOSPAM]linuxmail[DOT]org

<?php

    /**
     * A general class containing the main methods for the theming system to work with everything else
     * 
     * @author Joshua Kissoon
     * @date 20150101
     */
    class Theme implements CodeliTheme
    {

        /**
         * Add the theme's libraries and scripts 
         */
        public function init()
        {
            $themeRegistry = Codeli::getInstance()->getThemeRegistry();

            /* JQuery */
            $themeRegistry->addScript(SiteConfig::themeLibrariessUrl() . "jquery/jquery.min.js");

            /* Adding Angular and it's sub-libs */
            $themeRegistry->addScript(SiteConfig::themeLibrariessUrl() . "angular/angular/angular.min.js", 1, true);
            $themeRegistry->addScript(SiteConfig::themeLibrariessUrl() . "angular/angular-route/angular-route.min.js", 1, true);

            /* Adding Bootstrap */
            $themeRegistry->addCss(SiteConfig::themeLibrariessUrl() . "bootstrap/css/bootstrap.min.css");
            $themeRegistry->addScript(SiteConfig::themeLibrariessUrl() . "bootstrap/js/bootstrap.min.js");


            $themeRegistry->addCss(SiteConfig::themeCssUrl() . "style.css");
            $themeRegistry->addCss(array("file" => SiteConfig::themeCssUrl() . "print.css", "media" => "print"));

            $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "main.min.js", 20);

            /* Our Angular JS Files */
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/app.js", 1);
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/Data.js", 2);
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/controllers/main.js");
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/controllers/login.js");
            
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/controllers/user/user.js");
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/controllers/user/rbac.js");
            $themeRegistry->addScript(SystemConfig::frontendURL() . "ng-app/controllers/user/role.js");
        }

    }
    
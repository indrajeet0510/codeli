<?php

    /**
     * Base module class for the user module
     *
     * @author Joshua Kissoon
     * @since 20150103
     */
    class UserModule implements Module
    {

        private $name = "User Management";
        private $description = "Module that handles all User Management";

        public function getDescription()
        {
            return $this->description;
        }

        public function getTitle()
        {
            return $this->name;
        }

        public function getPermissions()
        {
            $permissions = array();

            /* User Permissions */
            $permissions[] = new PermissionInfo("user_view_user", "User: View");
            $permissions[] = new PermissionInfo("user_add_user", "User: Add");
            $permissions[] = new PermissionInfo("user_edit_user", "User: Edit");
            $permissions[] = new PermissionInfo("user_delete_user", "User: Delete");

            $permissions[] = new PermissionInfo("user_view_role", "User: View User Roles");
            $permissions[] = new PermissionInfo("user_add_role", "User: Add User Role");
            $permissions[] = new PermissionInfo("user_edit_role", "User: Edit User Role");

            /* RBAC Permissions */
            $permissions[] = new PermissionInfo("rbac_view_role", "RBAC: View Role");
            $permissions[] = new PermissionInfo("rbac_add_role", "RBAC: Add Role");
            $permissions[] = new PermissionInfo("rbac_edit_role", "RBAC: Edit Role");

            $permissions[] = new PermissionInfo("rbac_view_permission", "RBAC: View Permission");
            $permissions[] = new PermissionInfo("rbac_add_role_permission", "RBAC: Add Role Permission");
            $permissions[] = new PermissionInfo("rbac_remove_role_permission", "RBAC: Delete Role Permission");



            return $permissions;
        }

        public function getRoutes()
        {
            $routes = array();

            /* User Routes */
            $routes[] = new RouteInfo("admin/user", "user_add_user", "user_add_user", HTTP::METHOD_PUT);
            $routes[] = new RouteInfo("admin/user", "user_edit_user", "user_edit_user", HTTP::METHOD_POST);
            $routes[] = new RouteInfo("admin/user/all", "user_get_users", "user_view_user", HTTP::METHOD_POST);
            $routes[] = new RouteInfo("admin/user/%", "user_get_user", "user_view_user", HTTP::METHOD_GET);
            $routes[] = new RouteInfo("admin/user/login", "user_login_user", "", HTTP::METHOD_POST);
            $routes[] = new RouteInfo("admin/user/session", "user_get_session", "", HTTP::METHOD_GET);
            $routes[] = new RouteInfo("admin/user/logout", "user_logout_user", "", HTTP::METHOD_POST);

            /**
             * RBAC Routes
             */
            $routes[] = new RouteInfo("rbac/role", "rbac_role_add", "rbac_add_role", HTTP::METHOD_PUT);
            $routes[] = new RouteInfo("rbac/role/%", "rbac_role_view", "rbac_view_role", HTTP::METHOD_GET);
            $routes[] = new RouteInfo("rbac/role", "rbac_role_edit", "rbac_edit_role", HTTP::METHOD_POST);
            $routes[] = new RouteInfo("rbac/role/all", "rbac_role_view_all", "rbac_view_role", HTTP::METHOD_POST);
            $routes[] = new RouteInfo("rbac/permission/all", "rbac_get_permissions", "rbac_view_permission", HTTP::METHOD_GET);

            /**
             * User Role Routes 
             */
            $routes[] = new RouteInfo("rbac/role/permission", "rbac_role_add_permission", "rbac_add_role_permission", HTTP::METHOD_PUT);
            $routes[] = new RouteInfo("rbac/role/permission", "rbac_role_remove_permission", "rbac_remove_role_permission", HTTP::METHOD_POST);


            return $routes;
        }

        public function getDependencies()
        {
            return array();
        }

    }
    
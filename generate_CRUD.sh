php app/console doctrine:mapping:import --force AppBundle xml
php app/console doctrine:mapping:convert annotation ./src --force
php app/console doctrine:generate:entities AppBundle



#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefArticles --route-prefix=admstzef/articles
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefCategories --route-prefix=admstzef/categories
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefParameters --route-prefix=admstzef/parameters
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefMenus --route-prefix=admstzef/menus
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefPages --route-prefix=admstzef/pages
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefTypesPages --route-prefix=admstzef/types_pages
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefThemes --route-prefix=admstzef/themes
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefSections --route-prefix=admstzef/sections
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefSectionsTheme --route-prefix=admstzef/sections_theme
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefStates --route-prefix=admstzef/states
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefStatesPublication --route-prefix=admstzef/states_publication
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefUsers --route-prefix=admstzef/users
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefBanners --route-prefix=admstzef/banners
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefBannerDeta --route-prefix=admstzef/banner_deta
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefUsersGroups --route-prefix=admstzef/users_groups
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefTypesAccess --route-prefix=admstzef/types_access
#php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefModules --route-prefix=admstzef/modules
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefTypesModules --route-prefix=admstzef/types_modules
php app/console generate:doctrine:crud --format=annotation --with-write --overwrite --no-interaction --entity=AppBundle:CmsStzefDisplayTypes --route-prefix=admstzef/display_types

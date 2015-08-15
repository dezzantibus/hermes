<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_homepage extends handler
{

    public function run()
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        /** @var  $category data_category */
        $home_categories = model_category::getHomepageList();
        foreach( $home_categories->getData() as $category )
        {

            switch( $category->home_block )
            {
                case 'layout_homepage_ModuleG2P0': $number = 2; break;
                case 'layout_homepage_ModuleG3P0': $number = 3; break;
                case 'layout_homepage_ModuleG1P4': $number = 5; break;
                case 'layout_homepage_ModuleG2P6': $number = 8; break;
                case 'layout_homepage_ModuleG1P6': $number = 7; break;
                default: $number = 0;
            }

            $category->home_articles = model_article::getHomeCategory( $category, $number );

        }

        $hero_articles    = model_article::getHero();
        $popular_articles = model_article::getPopular();

        // Render page
        $page = new layout_homepage_page( $header, $footer, $sidebar, $home_categories, $hero_articles, $popular_articles );
        $page->render();

    }

}
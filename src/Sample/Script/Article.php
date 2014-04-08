<?php
/**
 * Article Data Generator Script for Theme
 *
 * @package     Pointless
 * @author      ScarWu
 * @copyright   Copyright (c) 2012-2014, ScarWu (http://scar.simcz.tw/)
 * @link        http://github.com/scarwu/Pointless
 */

use NanoCLI\IO;

class Article extends ThemeScript
{
    public function __construct()
    {
        parent::__construct();

        $this->list = Resource::get('article');
    }

    /**
     * Generate Data
     *
     * @param string
     */
    public function gen()
    {
        $count = 0;
        $total = count($this->list);
        $keys = array_keys($this->list);

        $blog = Resource::get('config')['blog'];

        foreach ((array) $this->list as $post) {
            IO::log("Building article/{$post['url']}");

            $post['url'] = "article/{$post['url']}";
            $post['bar']['index'] = $count + 1;
            $post['bar']['total'] = $total;

            if (isset($keys[$count - 1])) {
                $key = $keys[$count - 1];
                $title = $this->list[$key]['title'];
                $url = $this->list[$key]['url'];

                $post['bar']['p_title'] = $title;
                $post['bar']['p_url'] = "{$blog['base']}article/$url";
            }

            if (isset($keys[$count + 1])) {
                $key = $keys[$count + 1];
                $title = $this->list[$key]['title'];
                $url = $this->list[$key]['url'];

                $post['bar']['n_title'] = $title;
                $post['bar']['n_url'] = "{$blog['base']}article/$url";
            }

            $count++;

            $ext = [];
            $ext['title'] = "{$post['title']} | {$blog['name']}";
            $ext['keywords'] = "{$blog['keywords']},{$post['keywords']}";
            $ext['url'] = $blog['dn'] . $blog['base'];

            $block = Resource::get('block');
            $block['container'] = $this->render([
                'blog' => array_merge($blog, $ext),
                'post' => $post
            ], 'container/article.php');

            // Save HTML
            $this->save($post['url'], $this->render([
                'blog' => array_merge($blog, $ext),
                'block' => $block
            ], 'index.php'));
        }
    }
}

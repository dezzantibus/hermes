<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_comment extends action
{

    public function run()
    {

        echo                     '<li>',
                        '<article>',
//                            '<div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>',
                            '<div class="comment-meta">',
                                '<span class="comment-author"><a href="#">', $this->data['nick'], '</a> </span>',
                                '<span class="comment-date">', data_article::dateForDisplay( time() ), '</span>',
                            '</div>',
                            '<div class="comment-content">',
                                '<p>', $this->data['text'], '</p>',
//                                '<a class="reply" href="#">Reply</a>',
                            '</div>',
                        '</article>',
                    '</li>';


    }

}
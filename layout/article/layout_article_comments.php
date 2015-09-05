<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_comments extends layout
{

    private $comments;

    private $article;

    function __construct( data_array $comments, data_article $article )
    {
        $this->comments = $comments;
        $this->article  = $article;
    }

    public function render()
    {



        echo
        '<div class="comments">',

            //<!-- Respond -->
            '<div id="respond">',
                '<p class="title"><span>', constant::$text['leave reply'], '</span></p>',
                '<form>',
                    '<div class="form-group">',
                        '<label>', constant::$text['name'], '<span>*</span></label>',
                        '<input type="text" name="nick">',
                    '</div>',
//                    '<div class="form-group">',
//                        '<label>Email<span>*</span></label>',
//                        '<input type="text" placeholder="Type your email adress...">',
//                    '</div>',
//                    '<div class="form-group">',
//                        '<label>Website</label>',
//                        '<input type="text" placeholder="Type your website URL...">',
//                    '</div>',
                    '<div class="form-group">',
                        '<label>', constant::$text['comment'], '<span>*</span></label>',
                        '<textarea name="text"></textarea>',
                    '</div>',
                    '<input class="btn" name="submit" type="button" onclick="submit_comment();" id="submit" value="', constant::$text['post a comment'], '">',
                '</form>',
            '</div>',

            '<h4 style="display:none" id="confirm">', constant::$text['comment approval'], '</h4>',


            '<script type="text/javascript">',

                'function submit_comment(){',

                    'if($("#respond input[name=nick]").val()==""){',
                        'alert("Name is required");',
                        'return false;',
                    '}',
                    'if($("#respond textarea").val()==""){',
                        'alert("Comment is required");',
                        'return false;',
                    '}',
                    '$.post(',
                        '"/comment.action",',
                        '{ approved: ', constant::$text['approval'], ', article_id: ', $this->article->id, ', nick: $("#respond input[name=nick]").val(), text: $("#respond textarea").val() }',
                    ').done(function( data ) { ',
                        '$("#respond").hide(); ';

                        if( constant::$text['approval'] == 0 )
                        {
                            echo '$("#confirm").show(); ';
                        }
                        else
                        {
                            echo '$("ol.comments-list").prepend(data)';
                        }

                    echo
                    '});',
                '}',

            '</script>';

            echo
            '<p class="title"><span>', $this->comments->count(), ' <strong>', constant::$text['comments'], '</strong></span></p>',
            '<ol class="comments-list">';

                /** @var $comment data_comment */
                foreach( $this->comments->getData() as $comment )
                {

                    echo
                    '<li>',
                        '<article>',
//                            '<div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>',
                            '<div class="comment-meta">',
                                '<span class="comment-author"><a href="#">', $comment->nick, '</a></span>&nbsp;&nbsp;',
                                '<span class="comment-date">', data_article::dateForDisplay( $comment->created ), '</span>',
                            '</div>',
                            '<div class="comment-content">',
                                '<p>', $comment->text, '</p>',
//                                '<a class="reply" href="#">Reply</a>',
                            '</div>',
                        '</article>',
                    '</li>';

                }

            echo
            '</ol>',
        '</div>';

    }

}


/*


            <p class="title"><span>4 <strong>Comments</strong></span></p>
            <ol class="comments-list">
                <li>
                    <article>
                        <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                        <div class="comment-meta">
                            <span class="comment-author"><a href="#">Jane Smith</a></span>
                            <span class="comment-date">December 19, 2014</span>
                        </div>
                        <div class="comment-content">
                            <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                            <a class="reply" href="#">Reply</a>
                        </div>
                    </article>
                    <ul class="children">
                        <li>
                            <article>
                                <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                                <div class="comment-meta">
                                    <span class="comment-author"><a href="#">Jane Smith</a></span>
                                    <span class="comment-date">December 19, 2014</span>
                                </div>
                                <div class="comment-content">
                                    <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                                    <a class="reply" href="#">Reply</a>
                                </div>
                            </article>
                            <ul class="children">
                                <li>
                                    <article>
                                        <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                                        <div class="comment-meta">
                                            <span class="comment-author"><a href="#">Jane Smith</a></span>
                                            <span class="comment-date">December 19, 2014</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                                            <a class="reply" href="#">Reply</a>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                                        <div class="comment-meta">
                                            <span class="comment-author"><a href="#">Jane Smith</a></span>
                                            <span class="comment-date">December 19, 2014</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                                            <a class="reply" href="#">Reply</a>
                                        </div>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                                        <div class="comment-meta">
                                            <span class="comment-author"><a href="#">Jane Smith</a></span>
                                            <span class="comment-date">December 19, 2014</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                                            <a class="reply" href="#">Reply</a>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <article>
                        <div class="comment-avatar"><img src="demo/50x50.gif" alt="Avatar"/></div>
                        <div class="comment-meta">
                            <span class="comment-author"><a href="#">Jane Smith</a></span>
                            <span class="comment-date">December 19, 2014</span>
                        </div>
                        <div class="comment-content">
                            <p>Duis quis suscipit lacus, ac fringilla ligula. Aliquam sit amet rhoncus libero, a pharetra justo. Nulla quam nisl, varius nec dictum quis, volutpat at augue.</p>
                            <a class="reply" href="#">Reply</a>
                        </div>
                    </article>
                </li>



 */
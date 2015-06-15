<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_comments extends layout
{

    function __construct()
    {

    }

    public function render()
    {
        ?>
        <div class="comments">
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
            </ol>

            <!-- Respond -->
            <div id="respond">
                <p class="title"><span>Leave <strong>reply</strong></span></p>
                <form>
                    <div class="form-group">
                        <label>Name<span>*</span></label>
                        <input type="text" placeholder="Type your name...">
                    </div>
                    <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="text" placeholder="Type your email adress...">
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" placeholder="Type your website URL...">
                    </div>
                    <div class="form-group">
                        <label>Comment<span>*</span></label>
                        <textarea placeholder="Type your website URL..."></textarea>
                    </div>
                    <input class="btn" name="submit" type="submit" id="submit" value="Post a comment">
                </form>
            </div>

        </div>
        <?php
    }

}
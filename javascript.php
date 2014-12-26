<!DOCTYPE html>
<html lang="zh-cn">
<?php $title = 'JavaScript 插件 · Bootstrap 中文文档'; ?>
<?php include_once('header.php'); ?>
<body>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>

<!-- Docs master nav -->
<?php $nav = 'javascript'; ?>
<?php include_once('nav.php'); ?>


<!-- Docs page layout -->
<div class="bs-docs-header" id="content">
    <div class="container">
        <h1>JavaScript 插件</h1>

        <p>jQuery 插件为 Bootstrap 的组件赋予了“生命”。可以简单地一次性引入所有插件，或者逐个引入到你的页面中。</p>

    </div>
</div>

<div class="container bs-docs-container">

    <div class="row">
        <div class="col-md-9" role="main">
            <div class="bs-docs-section">
                <h1 id="js-overview" class="page-header">概览</h1>

                <h3 id="js-individual-compiled">单个还是全部引入</h3>

                <p>JavaScript 插件可以单个引入（使用 Bootstrap 提供的单个 <code>*.js</code> 文件），或者一次性全部引入（使用 <code>bootstrap.js</code>
                    或压缩版的 <code>bootstrap.min.js</code>）。</p>

                <div class="bs-callout bs-callout-danger">
                    <h4>建议使用压缩版的 JavaScript 文件</h4>

                    <p><code>bootstrap.js</code> 和 <code>bootstrap.min.js</code> 都包含了所有插件，你在使用时，只需选择一个引入页面就可以了。</p>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>组件的 data 属性</h4>

                    <p>不要在同一个元素上同时使用多个插件的 data 属性。例如，button 组件不能同时支持工具提示和控制模态框。如果需要的话，可以在其外面包裹一个额外的元素。</p>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>插件之间的依赖关系</h4>

                    <p>某些插件和 CSS 组件依赖于其它插件。如果你是单个引入每个插件的，请确保在文档中检查插件之间的依赖关系。注意，所有插件都依赖 jQuery
                        （也就是说，jQuery必须在所有插件<strong>之前</strong>引入页面）。 <a
                            href="https://github.com/twbs/bootstrap/blob/v3.3.0/bower.json"><code>bower.json</code></a>
                        文件中列出了 Bootstrap 所支持的 jQuery 版本。</p>
                </div>

                <h3 id="js-data-attrs">data 属性</h3>

                <p>你可以仅仅通过 data 属性 API 就能使用所有的 Bootstrap 插件，无需写一行 JavaScript 代码。这是 Bootstrap 中的一等 API，也应该是你的首选方式。</p>

                <p>话又说回来，在某些情况下可能需要将此功能关闭。因此，我们还提供了关闭 data 属性 API 的方法，即解除以 <code>data-api</code> 为命名空间并绑定在文档上的事件。就像下面这样：
                </p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="nb">document</span><span class="p">).</span><span class="nx">off</span><span
                                class="p">(</span><span class="s1">'.data-api'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <p>另外，如果是针对某个特定的插件，只需在 <code>data-api</code> 前面添加那个插件的名称作为命名空间，如下：</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="nb">document</span><span class="p">).</span><span class="nx">off</span><span
                                class="p">(</span><span class="s1">'.alert.data-api'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <h3 id="js-programmatic-api">编程方式的 API</h3>

                <p>我们为所有 Bootstrap 插件提供了纯 JavaScript 方式的 API。所有公开的 API
                    都是支持单独或链式调用方式，并且返回其所操作的元素集合（注：和jQuery的调用形式一致）。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'.btn.danger'</span><span class="p">).</span><span
                                class="nx">button</span><span class="p">(</span><span class="s1">'toggle'</span><span
                                class="p">).</span><span class="nx">addClass</span><span class="p">(</span><span
                                class="s1">'fat'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <p>所有方法都可以接受一个可选的 option 对象作为参数，或者一个代表特定方法的字符串，或者什么也不提供（在这种情况下，插件将会以默认值初始化）：</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">()</span> <span class="c1">// 以默认值初始化</span>
                            <span class="nx">$</span><span class="p">(</span><span class="s1">'#myModal'</span><span
                                class="p">).</span><span class="nx">modal</span><span class="p">({</span> <span
                                class="nx">keyboard</span><span class="o">:</span> <span class="kc">false</span> <span
                                class="p">})</span> <span class="c1">// initialized with no keyboard</span>
                            <span class="nx">$</span><span class="p">(</span><span class="s1">'#myModal'</span><span
                                class="p">).</span><span class="nx">modal</span><span class="p">(</span><span
                                class="s1">'show'</span><span class="p">)</span> <span
                                class="c1">// 初始化后立即调用 show 方法</span>
                        </code></pre>
                </div>

                <p>每个插件还通过 <code>Constructor</code> 属性暴露了其原始的构造函数：<code>$.fn.popover.Constructor</code>。如果你想获取某个插件的实例，可以直接通过页面元素获取：<code>$('[rel="popover"]').data('popover')</code>。
                </p>

                <h4>默认设置</h4>

                <p>每个插件都可以通过修改其自身的 <code>Constructor.DEFAULTS</code> 对象从而改变插件的默认设置：</p>

                <p>
                </p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">.</span><span
                                class="nx">fn</span><span class="p">.</span><span class="nx">modal</span><span
                                class="p">.</span><span class="nx">Constructor</span><span class="p">.</span><span
                                class="nx">DEFAULTS</span><span class="p">.</span><span class="nx">keyboard</span> <span
                                class="o">=</span> <span class="kc">false</span> <span class="c1">// 将模态框插件的 `keyboard` 默认选参数置为 false</span>
                        </code></pre>
                </div>

                <h3 id="js-noconflict">避免命名空间冲突</h3>

                <p>某些时候可能需要将 Bootstrap 插件与其他 UI 框架共同使用。在这种情况下，命名空间冲突随时可能发生。如果不幸发生了这种情况，你可以通过调用插件的
                    <code>.noConflict</code> 方法恢复其原始值。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="kd">var</span> <span class="nx">bootstrapButton</span>
                            <span class="o">=</span> <span class="nx">$</span><span class="p">.</span><span class="nx">fn</span><span
                                class="p">.</span><span class="nx">button</span><span class="p">.</span><span
                                class="nx">noConflict</span><span class="p">()</span> <span class="c1">// return $.fn.button to previously assigned value</span>
                            <span class="nx">$</span><span class="p">.</span><span class="nx">fn</span><span
                                class="p">.</span><span class="nx">bootstrapBtn</span> <span class="o">=</span> <span
                                class="nx">bootstrapButton</span> <span class="c1">// give $().bootstrapBtn the Bootstrap functionality</span>
                        </code></pre>
                </div>

                <h3 id="js-events">事件</h3>

                <p>Bootstrap 为大部分插件所具有的动作提供了自定义事件。一般来说，这些事件都有不定式和过去式两种动词的命名形式，例如，不定式形式的动词（例如 <code>show</code>）表示其在事件开始时被触发；而过去式动词（例如
                    <code>shown</code> ）表示在动作执行完毕之后被触发。</p>

                <p>从 3.0.0 版本开始，所有 Bootstrap 事件的名称都采用命名空间方式。</p>

                <p>所有以不定式形式的动词命名的事件都提供了 <code>preventDefault</code> 功能。这就赋予你在动作开始执行前将其停止的能力。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'show.bs.modal'</span><span class="p">,</span> <span
                                class="kd">function</span> <span class="p">(</span><span class="nx">e</span><span
                                class="p">)</span> <span class="p">{</span>
                            <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nx">data</span><span
                                class="p">)</span> <span class="k">return</span> <span class="nx">e</span><span
                                class="p">.</span><span class="nx">preventDefault</span><span class="p">()</span> <span
                                class="c1">// 阻止模态框的展示</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>

                <h3 id="js-disabled">未对禁用 JavaScript 的浏览器提供补救措施</h3>

                <p>Bootstrap 插件未对禁用 JavaScript 的浏览器提供补救措施。如果你对这种情况下的用户体验很关心的话，请添加 <a
                        href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/noscript"><code>
                            &lt;noscript&gt;</code></a> 标签向你的用户进行解释（并告诉他们如何启用 JavaScript），或者按照你自己的方式提供补救措施。</p>

                <div class="bs-callout bs-callout-warning" id="callout-third-party-libs">
                    <h4>第三方工具库</h4>

                    <p><strong>Bootstrap 官方不提供对第三方 JavaScript 工具库的支持，</strong>例如 Prototype 或 jQuery UI。除了 <code>.noConflict</code>
                        和为事件名称添加命名空间，还可能会有兼容性方面的问题，这就需要你自己来处理了。</p>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="transitions" class="page-header">过渡效果
                    <small>transition.js</small>
                </h1>

                <h3>关于过渡效果</h3>

                <p>对于简单的过渡效果，只需将 <code>transition.js</code> 和其它 JS 文件一起引入即可。如果你使用的是编译（或压缩）版的 <code>bootstrap.js</code>
                    文件，就无需再单独将其引入了。</p>

                <h3>包含的内容</h3>

                <p>Transition.js 是针对 <code>transitionEnd</code> 事件的一个基本辅助工具，也是对 CSS 过渡效果的模拟。它被其它插件用来检测当前浏览器对是否支持 CSS
                    的过渡效果。</p>
            </div>

            <div class="bs-docs-section">
                <h1 id="modals" class="page-header">模态框
                    <small>modal.js</small>
                </h1>
                <p>模态框经过了优化，更加灵活，以弹出对话框的形式出现，具有最小和最实用的功能集。</p>

                <div class="bs-callout bs-callout-warning" id="callout-stacked-modals">
                    <h4>不支持模态框重叠</h4>

                    <p>千万不要在一个模态框上重叠另一个模态框。要想同时支持多个模态框，需要自己写额外的代码来实现。</p>
                </div>
                <div class="bs-callout bs-callout-warning" id="callout-modal-markup-placement">
                    <h4>模态框的 HTML 代码放置的位置</h4>

                    <p>务必将模态框的 HTML 代码放在文档的最高层级内（也就是说，尽量作为 body 标签的直接子元素），以避免其他组件影响模态框的展现和/或功能。</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>对于移动设备的附加说明</h4>

                    <p>这里提供了在移动设备上使用模态框有一些附加说明。请参考<a
                            href="http://v3.bootcss.com/getting-started/#support-fixed-position-keyboards">浏览器支持</a>章节。
                    </p>
                </div>

                <p><strong class="text-danger">Due to how HTML5 defines its semantics, the <code>autofocus</code> HTML
                        attribute has no effect in Bootstrap modals.</strong></p>

                <h2 id="modals-examples">实例</h2>

                <h3>静态实例</h3>

                <p>以下模态框包含了模态框的头、体和一组放置于底部的按钮。</p>

                <div class="bs-example bs-example-modal">
                    <div class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    <p>One fine body…</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"modal fade"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-dialog"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-content"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-header"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"close"</span>
                            <span class="na">data-dismiss=</span><span class="s">"modal"</span><span class="nt">&gt;&lt;span</span>
                            <span class="na">aria-hidden=</span><span class="s">"true"</span><span
                                class="nt">&gt;</span><span class="ni">&amp;times;</span><span class="nt">&lt;/span&gt;&lt;span</span>
                            <span class="na">class=</span><span class="s">"sr-only"</span><span class="nt">&gt;</span>Close<span
                                class="nt">&lt;/span&gt;&lt;/button&gt;</span>
                            <span class="nt">&lt;h4</span> <span class="na">class=</span><span
                                class="s">"modal-title"</span><span class="nt">&gt;</span>Modal title<span class="nt">&lt;/h4&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-body"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;p&gt;</span>One fine body<span class="ni">&amp;hellip;</span><span
                                class="nt">&lt;/p&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-footer"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-dismiss=</span><span class="s">"modal"</span><span
                                class="nt">&gt;</span>Close<span class="nt">&lt;/button&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>Save changes<span class="nt">&lt;/button&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span><span class="c">&lt;!-- /.modal-content --&gt;</span>
                            <span class="nt">&lt;/div&gt;</span><span class="c">&lt;!-- /.modal-dialog --&gt;</span>
                            <span class="nt">&lt;/div&gt;</span><span class="c">&lt;!-- /.modal --&gt;</span>
                        </code></pre>
                </div>

                <h3>动态实例</h3>

                <p>点击下面的按钮即可通过 JavaScript 启动一个模态框。此模态框将从上到下、逐渐浮现到页面前。</p>
                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Text in a modal</h4>

                                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

                                <h4>Popover in a modal</h4>

                                <p>This <a href="#" role="button"
                                           class="btn btn-default popover-test" title=""
                                           data-content="And here&#39;s some amazing content. It&#39;s very engaging. right?"
                                           data-original-title="A Title">button</a> should trigger a popover on click.
                                </p>

                                <h4>Tooltips in a modal</h4>

                                <p><a href="#" class="tooltip-test" title=""
                                      data-original-title="Tooltip">This link</a> and <a
                                        href="#" class="tooltip-test" title=""
                                        data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>

                                <hr>

                                <h4>Overflowing text to show scroll behavior</h4>

                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                    facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                    vestibulum at eros.</p>

                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                    lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                    scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                    metus auctor fringilla.</p>

                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                    facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                    vestibulum at eros.</p>

                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                    lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                    scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                    metus auctor fringilla.</p>

                                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                                    facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac,
                                    vestibulum at eros.</p>

                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis
                                    lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel
                                    scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non
                                    metus auctor fringilla.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <div class="bs-example" style="padding-bottom: 24px;">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Launch demo modal
                    </button>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span
                                class="c">&lt;!-- Button trigger modal --&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-primary btn-lg"</span>
                            <span class="na">data-toggle=</span><span class="s">"modal"</span> <span class="na">data-target=</span><span
                                class="s">"#myModal"</span><span class="nt">&gt;</span>
                            Launch demo modal
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="c">&lt;!-- Modal --&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal fade"</span> <span class="na">id=</span><span
                                class="s">"myModal"</span> <span class="na">tabindex=</span><span class="s">"-1"</span>
                            <span class="na">role=</span><span class="s">"dialog"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"myModalLabel"</span> <span class="na">aria-hidden=</span><span class="s">"true"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-dialog"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-content"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-header"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"close"</span>
                            <span class="na">data-dismiss=</span><span class="s">"modal"</span><span class="nt">&gt;&lt;span</span>
                            <span class="na">aria-hidden=</span><span class="s">"true"</span><span
                                class="nt">&gt;</span><span class="ni">&amp;times;</span><span class="nt">&lt;/span&gt;&lt;span</span>
                            <span class="na">class=</span><span class="s">"sr-only"</span><span class="nt">&gt;</span>Close<span
                                class="nt">&lt;/span&gt;&lt;/button&gt;</span>
                            <span class="nt">&lt;h4</span> <span class="na">class=</span><span
                                class="s">"modal-title"</span> <span class="na">id=</span><span
                                class="s">"myModalLabel"</span><span class="nt">&gt;</span>Modal title<span class="nt">&lt;/h4&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-body"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"modal-footer"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-dismiss=</span><span class="s">"modal"</span><span
                                class="nt">&gt;</span>Close<span class="nt">&lt;/button&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>Save changes<span class="nt">&lt;/button&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-warning">
                    <h4>增强模态框的可访问性</h4>

                    <p>务必为 <code>.modal</code> 添加 <code>role="dialog"</code>
                        属性，<code>aria-labelledby="myModalLabel"</code> 属性用于只想模态框的标题栏，<code>aria-hidden="true"</code>
                        用于通知辅助性工具略过模态框的 DOM元素。</p>

                    <p>另外，你还应该通过 <code>aria-describedby</code> 属性为模态框 <code>.modal</code> 添加描述性信息。</p>
                </div>

                <div class="bs-callout bs-callout-info">
                    <h4>嵌入 YouTube 视频（天朝无用）</h4>

                    <p>在模态框中嵌入 YouTube 视频需要增加一些额外的 JavaScript 代码，用于自动停止重放等功能，这些代码并没有在 Bootstrap 中提供。请参考这份<a
                            href="http://stackoverflow.com/questions/18622508/bootstrap-3-and-youtube-in-modal">发布在
                            Stack Overflow 上的文章</a>。</p>
                </div>

                <h2 id="modals-sizes">可选尺寸</h2>

                <p>模态框提供了两个可选尺寸，通过为 <code>.modal-dialog</code> 增加一个样式调整类实现。</p>

                <div class="bs-example">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bs-example-modal-lg">大模态框
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bs-example-modal-sm">小模态框
                    </button>
                </div>
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="c">&lt;!-- Large modal --&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span>
                            <span class="na">data-toggle=</span><span class="s">"modal"</span> <span class="na">data-target=</span><span
                                class="s">".bs-example-modal-lg"</span><span class="nt">&gt;</span>Large modal<span
                                class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal fade bs-example-modal-lg"</span>
                            <span class="na">tabindex=</span><span class="s">"-1"</span> <span
                                class="na">role=</span><span class="s">"dialog"</span> <span
                                class="na">aria-labelledby=</span><span class="s">"myLargeModalLabel"</span> <span
                                class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-dialog modal-lg"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-content"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>

                            <span class="c">&lt;!-- Small modal --&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span>
                            <span class="na">data-toggle=</span><span class="s">"modal"</span> <span class="na">data-target=</span><span
                                class="s">".bs-example-modal-sm"</span><span class="nt">&gt;</span>Small modal<span
                                class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal fade bs-example-modal-sm"</span>
                            <span class="na">tabindex=</span><span class="s">"-1"</span> <span
                                class="na">role=</span><span class="s">"dialog"</span> <span
                                class="na">aria-labelledby=</span><span class="s">"mySmallModalLabel"</span> <span
                                class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-dialog modal-sm"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"modal-content"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <!--  Modal content for the above example -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <h2 id="modals-remove-animation">禁止动画效果</h2>

                <p>如果你不需要模态框弹出时的动画效果（淡入淡出效果），删掉 <code>.fade</code> 类即可。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"modal"</span> <span class="na">tabindex=</span><span
                                class="s">"-1"</span> <span class="na">role=</span><span class="s">"dialog"</span> <span
                                class="na">aria-labelledby=</span><span class="s">""</span> <span class="na">aria-hidden=</span><span
                                class="s">"true"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h2 id="modals-usage">用法</h2>

                <p>通过 data 属性或 JavaScript 调用模态框插件，可以根据需要动态展示隐藏的内容。模态框弹出时还会为 <code>&lt;body&gt;</code> 元素添加 <code>.modal-open</code>
                    类，从而覆盖页面默认的滚动行为，并且还会自动生成一个 <code>.modal-backdrop</code> 元素用于提供一个可点击的区域，点击此区域就即可关闭模态框。</p>

                <h3>通过 data 属性</h3>

                <p>不需写 JavaScript 代码也可激活模态框。通过在一个起控制器作用的元素（例如：按钮）上添加 <code>data-toggle="modal"</code> 属性，或者 <code>data-target="#foo"</code>
                    属性，再或者 <code>href="#foo"</code> 属性，用于指向被控制的模态框。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">data-toggle=</span><span class="s">"modal"</span> <span class="na">data-target=</span><span
                                class="s">"#myModal"</span><span class="nt">&gt;</span>Launch modal<span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <h3>通过 JavaScript 调用</h3>

                <p>只需一行 JavaScript 代码，即可通过元素的 id <code>myModal</code> 调用模态框：</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">(</span><span class="nx">options</span><span class="p">)</span>
                        </code></pre>
                </div>

                <h3>参数</h3>

                <p>可以将选项通过 data 属性或 JavaScript 代码传递。对于 data 属性，需要将参数名称放到 <code>data-</code> 之后，例如
                    <code>data-backdrop=""</code>。</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">名称</th>
                            <th style="width: 50px;">类型</th>
                            <th style="width: 50px;">默认值</th>
                            <th>描述</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>backdrop</td>
                            <td>boolean 或 字符串 <code>'static'</code></td>
                            <td>true</td>
                            <td>Includes a modal-backdrop element. Alternatively, specify <code>static</code> for a
                                backdrop which doesn't close the modal on click.
                            </td>
                        </tr>
                        <tr>
                            <td>keyboard</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>键盘上的 esc 键被按下时关闭模态框。</td>
                        </tr>
                        <tr>
                            <td>show</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>模态框初始化之后就立即显示出来。</td>
                        </tr>
                        <tr>
                            <td>remote</td>
                            <td>path</td>
                            <td>false</td>
                            <td>
                                <p><span class="text-danger">This option is deprecated since v3.2.1 and will be removed in v4.</span>
                                    We recommend instead using client-side templating or a data binding framework, or
                                    calling <a href="http://api.jquery.com/load/">jQuery.load</a> yourself.</p>

                                <p>如果提供的是 URL，将利用 jQuery 的 <code>load</code> 方法<strong>从此 URL 地址加载要展示的内容（只加载一次）</strong>并插入
                                    <code>.modal-content</code> 内。如果使用的是 data 属性 API，还可以利用 <code>href</code>
                                    属性指定内容来源地址。下面是一个实例：</p>

                                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                                <div class="highlight"><pre><code class="html"><span class="nt">&lt;a</span> <span
                                                class="na">data-toggle=</span><span class="s">"modal"</span> <span
                                                class="na">href=</span><span class="s">"remote.html"</span> <span
                                                class="na">data-target=</span><span class="s">"#modal"</span><span
                                                class="nt">&gt;</span>Click me<span class="nt">&lt;/a&gt;</span>
                                        </code></pre>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

                <h3>方法</h3>

                <h4>.modal(options)</h4>

                <p>将页面中的某块内容作为模态框激活。接受可选参数 <code>object</code>。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">({</span>
                            <span class="nx">keyboard</span><span class="o">:</span> <span class="kc">false</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>

                <h4>.modal('toggle')</h4>

                <p>手动打开或关闭模态框。<strong>在模态框显示或隐藏之前返回到主调函数中</strong>（也就是，在触发 <code>shown.bs.modal</code> 或 <code>hidden.bs.modal</code>
                    事件之前）。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">(</span><span class="s1">'toggle'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <h4>.modal('show')</h4>

                <p>手动打开模态框。<strong>在模态框显示之前返回到主调函数中</strong> （也就是，在触发 <code>shown.bs.modal</code> 事件之前）。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">(</span><span class="s1">'show'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <h4>.modal('hide')</h4>

                <p>手动隐藏模态框。<strong>在模态框隐藏之前返回到主调函数中</strong> （也就是，在触发 <code>hidden.bs.modal</code> 事件之前）。</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">modal</span><span
                                class="p">(</span><span class="s1">'hide'</span><span class="p">)</span>
                        </code></pre>
                </div>

                <h3>事件</h3>

                <p>Bootstrap 的模态框类提供了一些事件用于监听并执行你自己的代码。</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">事件类型</th>
                            <th>描述</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.modal</td>
                            <td><code>show</code> 方法调用之后立即触发该事件。如果是通过点击某个作为触发器的元素，则此元素可以通过事件的 <code>relatedTarget</code>
                                属性进行访问。
                            </td>
                        </tr>
                        <tr>
                            <td>shown.bs.modal</td>
                            <td>此事件在模态框已经显示出来（并且同时在 CSS 过渡效果完成）之后被触发。如果是通过点击某个作为触发器的元素，则此元素可以通过事件的
                                <code>relatedTarget</code> 属性进行访问。
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.modal</td>
                            <td><code>hide</code> 方法调用之后立即触发该事件。</td>
                        </tr>
                        <tr>
                            <td>hidden.bs.modal</td>
                            <td>此事件在模态框被隐藏（并且同时在 CSS 过渡效果完成）之后被触发。</td>
                        </tr>
                        <tr>
                            <td>loaded.bs.modal</td>
                            <td>从<code>远端的数据源</code>加载完数据之后触发该事件。</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myModal'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'hidden.bs.modal'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">(</span><span class="nx">e</span><span
                                class="p">)</span> <span class="p">{</span>
                            <span class="c1">// do something...</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="dropdowns" class="page-header">Dropdowns
                    <small>dropdown.js</small>
                </h1>

                <h2 id="dropdowns-examples">Examples</h2>

                <p>Add dropdown menus to nearly anything with this simple plugin, including the navbar, tabs, and
                    pills.</p>

                <h3>Within a navbar</h3>

                <div class="bs-example">
                    <nav id="navbar-example" class="navbar navbar-default navbar-static" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                                        data-target=".bs-example-js-navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Project Name</a>
                            </div>
                            <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a id="drop1" href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Another action</a>
                                            </li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Something else
                                                    here</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Separated link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a id="drop2" href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Another action</a>
                                            </li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Something else
                                                    here</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Separated link</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li id="fat-menu" class="dropdown">
                                        <a id="drop3" href="#" class="dropdown-toggle"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Another action</a>
                                            </li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Something else
                                                    here</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                       href="https://twitter.com/fat">Separated link</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.nav-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /navbar-example -->
                </div>
                <!-- /example -->

                <h3>Within pills</h3>

                <div class="bs-example">
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="active"><a href="#">Regular
                                link</a></li>
                        <li role="presentation" class="dropdown">
                            <a id="drop4" href="#" class="dropdown-toggle"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                <span class="caret"></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another
                                        action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something
                                        else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated
                                        link</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a id="drop5" href="#" class="dropdown-toggle"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                <span class="caret"></span>
                            </a>
                            <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another
                                        action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something
                                        else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated
                                        link</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a id="drop6" href="#" class="dropdown-toggle"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                <span class="caret"></span>
                            </a>
                            <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop6">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a>
                                </li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Another
                                        action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Something
                                        else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Separated
                                        link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /pills -->
                </div>
                <!-- /example -->


                <h2 id="dropdowns-usage">Usage</h2>

                <p>Via data attributes or JavaScript, the dropdown plugin toggles hidden content (dropdown menus) by
                    toggling the <code>.open</code> class on the parent list item.</p>

                <p>On mobile devices, opening a dropdown adds a <code>.dropdown-backdrop</code> as a tap area for
                    closing dropdown menus when tapping outside the menu, a requirement for proper iOS support. <strong
                        class="text-danger">This means that switching from an open dropdown menu to a different dropdown
                        menu requires an extra tap on mobile.</strong></p>

                <p>Note: The <code>data-toggle="dropdown"</code> attribute is relied on for closing dropdown menus at an
                    application level, so it's a good idea to always use it.</p>

                <h3>Via data attributes</h3>

                <p>Add <code>data-toggle="dropdown"</code> to a link or button to toggle a dropdown.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"dropdown"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;button</span> <span class="na">id=</span><span
                                class="s">"dLabel"</span> <span class="na">type=</span><span class="s">"button"</span>
                            <span class="na">data-toggle=</span><span class="s">"dropdown"</span> <span class="na">aria-haspopup=</span><span
                                class="s">"true"</span> <span class="na">aria-expanded=</span><span
                                class="s">"false"</span><span class="nt">&gt;</span>
                            Dropdown trigger
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span
                                class="s">"caret"</span><span class="nt">&gt;&lt;/span&gt;</span>
                            <span class="nt">&lt;/button&gt;</span>
                            <span class="nt">&lt;ul</span> <span class="na">class=</span><span
                                class="s">"dropdown-menu"</span> <span class="na">role=</span><span
                                class="s">"menu"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"dLabel"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/ul&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>
                <p>To keep URLs intact with link buttons, use the <code>data-target</code> attribute instead of <code>href="#"</code>.
                </p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"dropdown"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">id=</span><span class="s">"dLabel"</span>
                            <span class="na">data-target=</span><span class="s">"#"</span> <span class="na">href=</span><span
                                class="s">"http://example.com"</span> <span class="na">data-toggle=</span><span
                                class="s">"dropdown"</span> <span class="na">aria-haspopup=</span><span
                                class="s">"true"</span> <span class="na">aria-expanded=</span><span
                                class="s">"false"</span><span class="nt">&gt;</span>
                            Dropdown trigger
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span
                                class="s">"caret"</span><span class="nt">&gt;&lt;/span&gt;</span>
                            <span class="nt">&lt;/a&gt;</span>

                            <span class="nt">&lt;ul</span> <span class="na">class=</span><span
                                class="s">"dropdown-menu"</span> <span class="na">role=</span><span
                                class="s">"menu"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"dLabel"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/ul&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h3>Via JavaScript</h3>

                <p>Call the dropdowns via JavaScript:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'.dropdown-toggle'</span><span class="p">).</span><span
                                class="nx">dropdown</span><span class="p">()</span>
                        </code></pre>
                </div>
                <div class="bs-callout bs-callout-info">
                    <h4><code>data-toggle="dropdown"</code> still required</h4>

                    <p>Regardless of whether you call your dropdown via JavaScript or instead use the data-api, <code>data-toggle="dropdown"</code>
                        is always required to be present on the dropdown's trigger element.</p>
                </div>

                <h3>Options</h3>

                <p><em>None</em></p>

                <h3>Methods</h3>
                <h4>$().dropdown('toggle')</h4>

                <p>Toggles the dropdown menu of a given navbar or tabbed navigation.</p>

                <h3>Events</h3>

                <p>All dropdown events are fired at the <code>.dropdown-menu</code>'s parent element.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.dropdown</td>
                            <td>This event fires immediately when the show instance method is called. The toggling
                                anchor element is available as the <code>relatedTarget</code> property of the event.
                            </td>
                        </tr>
                        <tr>
                            <td>shown.bs.dropdown</td>
                            <td>This event is fired when the dropdown has been made visible to the user (will wait for
                                CSS transitions, to complete). The toggling anchor element is available as the <code>relatedTarget</code>
                                property of the event.
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.dropdown</td>
                            <td>This event is fired immediately when the hide instance method has been called. The
                                toggling anchor element is available as the <code>relatedTarget</code> property of the
                                event.
                            </td>
                        </tr>
                        <tr>
                            <td>hidden.bs.dropdown</td>
                            <td>This event is fired when the dropdown has finished being hidden from the user (will wait
                                for CSS transitions, to complete). The toggling anchor element is available as the
                                <code>relatedTarget</code> property of the event.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ./bs-table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myDropdown'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'show.bs.dropdown'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="scrollspy" class="page-header">ScrollSpy
                    <small>scrollspy.js</small>
                </h1>

                <h2 id="scrollspy-examples">Example in navbar</h2>

                <p>The ScrollSpy plugin is for automatically updating nav targets based on scroll position. Scroll the
                    area below the navbar and watch the active class change. The dropdown sub items will be highlighted
                    as well.</p>

                <div class="bs-example">
                    <nav id="navbar-example2" class="navbar navbar-default navbar-static" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                                        data-target=".bs-example-js-navbar-scrollspy">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Project Name</a>
                            </div>
                            <div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#fat">@fat</a></li>
                                    <li><a href="#mdo">@mdo</a></li>
                                    <li class="dropdown">
                                        <a href="#" id="navbarDrop1"
                                           class="dropdown-toggle" data-toggle="dropdown">Dropdown <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="navbarDrop1">
                                            <li><a href="#one" tabindex="-1">one</a>
                                            </li>
                                            <li><a href="#two" tabindex="-1">two</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#three"
                                                   tabindex="-1">three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
                        <h4 id="fat">@fat</h4>

                        <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they
                            sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan.
                            Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts,
                            williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund
                            culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel
                            keffiyeh artisan ullamco consequat.</p>
                        <h4 id="mdo">@mdo</h4>

                        <p>Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard
                            aliqua cupidatat mcsweeney's vero. Cupidatat four loko nisi, ea helvetica nulla carles.
                            Tattooed cosby sweater food truck, mcsweeney's quis non freegan vinyl. Lo-fi wes anderson +1
                            sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer
                            vice keytar deserunt.</p>
                        <h4 id="one">one</h4>

                        <p>Occaecat commodo aliqua delectus. Fap craft beer deserunt skateboard ea. Lomo bicycle rights
                            adipisicing banh mi, velit ea sunt next level locavore single-origin coffee in magna veniam.
                            High life id vinyl, echo park consequat quis aliquip banh mi pitchfork. Vero VHS est
                            adipisicing. Consectetur nisi DIY minim messenger bag. Cred ex in, sustainable delectus
                            consectetur fanny pack iphone.</p>
                        <h4 id="two">two</h4>

                        <p>In incididunt echo park, officia deserunt mcsweeney's proident master cleanse thundercats
                            sapiente veniam. Excepteur VHS elit, proident shoreditch +1 biodiesel laborum craft beer.
                            Single-origin coffee wayfarers irure four loko, cupidatat terry richardson master cleanse.
                            Assumenda you probably haven't heard of them art party fanny pack, tattooed nulla cardigan
                            tempor ad. Proident wolf nesciunt sartorial keffiyeh eu banh mi sustainable. Elit wolf
                            voluptate, lo-fi ea portland before they sold out four loko. Locavore enim nostrud mlkshk
                            brooklyn nesciunt.</p>
                        <h4 id="three">three</h4>

                        <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they
                            sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan.
                            Velit seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts,
                            williamsburg hoodie minim qui you probably haven't heard of them et cardigan trust fund
                            culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel
                            keffiyeh artisan ullamco consequat.</p>

                        <p>Keytar twee blog, culpa messenger bag marfa whatever delectus food truck. Sapiente synth id
                            assumenda. Locavore sed helvetica cliche irony, thundercats you probably haven't heard of
                            them consequat hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before they sold
                            out, terry richardson proident brunch nesciunt quis cosby sweater pariatur keffiyeh ut
                            helvetica artisan. Cardigan craft beer seitan readymade velit. VHS chambray laboris tempor
                            veniam. Anim mollit minim commodo ullamco thundercats.
                        </p>
                    </div>
                </div>
                <!-- /example -->


                <h2 id="scrollspy-usage">Usage</h2>

                <div class="bs-callout bs-callout-warning">
                    <h4>Requires Bootstrap nav</h4>

                    <p>Scrollspy currently requires the use of a <a href="http://v3.bootcss.com/components/#nav">Bootstrap
                            nav component</a> for proper highlighting of active links.</p>
                </div>

                <h3>Requires relative positioning</h3>

                <p>No matter the implementation method, scrollspy requires the use of <code>position: relative;</code>
                    on the element you're spying on. In most cases this is the <code>&lt;body&gt;</code>.</p>

                <h3>Via data attributes</h3>

                <p>To easily add scrollspy behavior to your topbar navigation, add <code>data-spy="scroll"</code> to the
                    element you want to spy on (most typically this would be the <code>&lt;body&gt;</code>). Then add
                    the <code>data-target</code> attribute with the ID or class of the parent element of any Bootstrap
                    <code>.nav</code> component.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="css"><span class="nt">body</span> <span class="p">{</span>
                            <span class="k">position</span><span class="o">:</span> <span class="k">relative</span><span
                                class="p">;</span>
                            <span class="p">}</span>
                        </code></pre>
                </div>
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;body</span> <span class="na">data-spy=</span><span
                                class="s">"scroll"</span> <span class="na">data-target=</span><span class="s">".navbar-example"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"navbar-example"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;ul</span> <span class="na">class=</span><span
                                class="s">"nav nav-tabs"</span> <span class="na">role=</span><span
                                class="s">"tablist"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/ul&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            ...
                            <span class="nt">&lt;/body&gt;</span>
                        </code></pre>
                </div>

                <h3>Via JavaScript</h3>

                <p>After adding <code>position: relative;</code> in your CSS, call the scrollspy via JavaScript:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'body'</span><span class="p">).</span><span class="nx">scrollspy</span><span
                                class="p">({</span> <span class="nx">target</span><span class="o">:</span> <span
                                class="s1">'.navbar-example'</span> <span class="p">})</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>Resolvable ID targets required</h4>

                    <p>Navbar links must have resolvable id targets. For example, a <code>&lt;a href="#home"&gt;home&lt;/a&gt;</code>
                        must correspond to something in the DOM like <code>&lt;div id="home"&gt;&lt;/div&gt;</code>.</p>
                </div>
                <div class="bs-callout bs-callout-info">
                    <h4>Non-<code>:visible</code> target elements ignored</h4>

                    <p>Target elements that are not <a
                            href="http://api.jquery.com/visible-selector/"><code>:visible</code> according to jQuery</a>
                        will be ignored and their corresponding nav items will never be highlighted.</p>
                </div>

                <h3>Methods</h3>
                <h4>.scrollspy('refresh')</h4>

                <p>When using scrollspy in conjunction with adding or removing of elements from the DOM, you'll need to
                    call the refresh method like so:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'[data-spy="scroll"]'</span><span class="p">).</span><span
                                class="nx">each</span><span class="p">(</span><span class="kd">function</span> <span
                                class="p">()</span> <span class="p">{</span>
                            <span class="kd">var</span> <span class="nx">$spy</span> <span class="o">=</span> <span
                                class="nx">$</span><span class="p">(</span><span class="k">this</span><span
                                class="p">).</span><span class="nx">scrollspy</span><span class="p">(</span><span
                                class="s1">'refresh'</span><span class="p">)</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>


                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-offset=""</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 100px;">type</th>
                            <th style="width: 50px;">default</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>offset</td>
                            <td>number</td>
                            <td>10</td>
                            <td>Pixels to offset from top when calculating position of scroll.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ./bs-table-responsive -->

                <h3>Events</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>activate.bs.scrollspy</td>
                            <td>This event fires whenever a new item becomes activated by the scrollspy.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ./bs-table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myScrollspy'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'activate.bs.scrollspy'</span><span
                                class="p">,</span> <span class="kd">function</span> <span class="p">()</span> <span
                                class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="tabs" class="page-header">Togglable tabs
                    <small>tab.js</small>
                </h1>

                <h2 id="tabs-examples">Example tabs</h2>

                <p>Add quick, dynamic tab functionality to transition through panes of local content, even via dropdown
                    menus.</p>

                <div class="bs-example bs-example-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home"
                                                                  id="home-tab" role="tab" data-toggle="tab"
                                                                  aria-controls="home" aria-expanded="true">Home</a>
                        </li>
                        <li role="presentation"><a href="#profile" role="tab"
                                                   id="profile-tab" data-toggle="tab"
                                                   aria-controls="profile">Profile</a></li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDrop1" class="dropdown-toggle"
                               data-toggle="dropdown" aria-controls="myTabDrop1-contents">Dropdown <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                <li><a href="#dropdown1" tabindex="-1" role="tab"
                                       id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">@fat</a></li>
                                <li><a href="#dropdown2" tabindex="-1" role="tab"
                                       id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu
                                banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.
                                Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia
                                yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                                biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente
                                accusamus tattooed echo park.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                                etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl
                                craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold
                                out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack
                                portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral
                                locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft
                                beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                        </div>
                    </div>
                </div>
                <!-- /example -->

                <div class="bs-callout bs-callout-info">
                    <h4>Extends tabbed navigation</h4>

                    <p>This plugin extends the <a href="http://v3.bootcss.com/components/#nav-tabs">tabbed navigation
                            component</a> to add tabbable areas.</p>
                </div>


                <h2 id="tabs-usage">Usage</h2>

                <p>Enable tabbable tabs via JavaScript (each tab needs to be activated individually):</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTab a'</span><span class="p">).</span><span class="nx">click</span><span
                                class="p">(</span><span class="kd">function</span> <span class="p">(</span><span
                                class="nx">e</span><span class="p">)</span> <span class="p">{</span>
                            <span class="nx">e</span><span class="p">.</span><span class="nx">preventDefault</span><span
                                class="p">()</span>
                            <span class="nx">$</span><span class="p">(</span><span class="k">this</span><span class="p">).</span><span
                                class="nx">tab</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>

                <p>You can activate individual tabs in several ways:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTab a[href="#profile"]'</span><span class="p">).</span><span class="nx">tab</span><span
                                class="p">(</span><span class="s1">'show'</span><span class="p">)</span> <span
                                class="c1">// Select tab by name</span>
                            <span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTab a:first'</span><span class="p">).</span><span
                                class="nx">tab</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span> <span class="c1">// Select first tab</span>
                            <span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTab a:last'</span><span class="p">).</span><span
                                class="nx">tab</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span> <span class="c1">// Select last tab</span>
                            <span class="nx">$</span><span class="p">(</span><span class="s1">'#myTab li:eq(2) a'</span><span
                                class="p">).</span><span class="nx">tab</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span> <span class="c1">// Select third tab (0-indexed)</span>
                        </code></pre>
                </div>

                <h3>Markup</h3>

                <p>You can activate a tab or pill navigation without writing any JavaScript by simply specifying <code>data-toggle="tab"</code>
                    or <code>data-toggle="pill"</code> on an element. Adding the <code>nav</code> and
                    <code>nav-tabs</code> classes to the tab <code>ul</code> will apply the Bootstrap <a
                        href="http://v3.bootcss.com/components/#nav-tabs">tab styling</a>, while adding the
                    <code>nav</code> and <code>nav-pills</code> classes will apply <a
                        href="http://v3.bootcss.com/components/#nav-pills">pill styling</a>.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="c">&lt;!-- Nav tabs --&gt;</span>
                            <span class="nt">&lt;ul</span> <span class="na">class=</span><span
                                class="s">"nav nav-tabs"</span> <span class="na">role=</span><span
                                class="s">"tablist"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span> <span class="na">class=</span><span
                                class="s">"active"</span><span class="nt">&gt;&lt;a</span> <span class="na">href=</span><span
                                class="s">"#home"</span> <span class="na">role=</span><span class="s">"tab"</span> <span
                                class="na">data-toggle=</span><span class="s">"tab"</span><span class="nt">&gt;</span>Home<span
                                class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#profile"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Profile<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#messages"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Messages<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#settings"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Settings<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;/ul&gt;</span>

                            <span class="c">&lt;!-- Tab panes --&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"tab-content"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane active"</span>
                            <span class="na">id=</span><span class="s">"home"</span><span class="nt">&gt;</span>...<span
                                class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span
                                class="s">"profile"</span><span class="nt">&gt;</span>...<span
                                class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span class="s">"messages"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span class="s">"settings"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h3>Fade effect</h3>

                <p>To make tabs fade in, add <code>.fade</code> to each <code>.tab-pane</code>. The first tab pane must
                    also have <code>.in</code> to properly fade in initial content.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"tab-content"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane fade in active"</span>
                            <span class="na">id=</span><span class="s">"home"</span><span class="nt">&gt;</span>...<span
                                class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane fade"</span>
                            <span class="na">id=</span><span class="s">"profile"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane fade"</span>
                            <span class="na">id=</span><span class="s">"messages"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane fade"</span>
                            <span class="na">id=</span><span class="s">"settings"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h3>Methods</h3>
                <h4>$().tab</h4>

                <p>
                    Activates a tab element and content container. Tab should have either a <code>data-target</code> or
                    an <code>href</code> targeting a container node in the DOM.
                </p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;ul</span> <span
                                class="na">class=</span><span class="s">"nav nav-tabs"</span> <span
                                class="na">role=</span><span class="s">"tablist"</span> <span class="na">id=</span><span
                                class="s">"myTab"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span> <span class="na">class=</span><span
                                class="s">"active"</span><span class="nt">&gt;&lt;a</span> <span class="na">href=</span><span
                                class="s">"#home"</span> <span class="na">role=</span><span class="s">"tab"</span> <span
                                class="na">data-toggle=</span><span class="s">"tab"</span><span class="nt">&gt;</span>Home<span
                                class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#profile"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Profile<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#messages"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Messages<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">role=</span><span
                                class="s">"presentation"</span><span class="nt">&gt;&lt;a</span> <span
                                class="na">href=</span><span class="s">"#settings"</span> <span
                                class="na">role=</span><span class="s">"tab"</span> <span class="na">data-toggle=</span><span
                                class="s">"tab"</span><span class="nt">&gt;</span>Settings<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;/ul&gt;</span>

                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"tab-content"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span class="s">"tab-pane active"</span>
                            <span class="na">id=</span><span class="s">"home"</span><span class="nt">&gt;</span>...<span
                                class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span
                                class="s">"profile"</span><span class="nt">&gt;</span>...<span
                                class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span class="s">"messages"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">role=</span><span
                                class="s">"tabpanel"</span> <span class="na">class=</span><span
                                class="s">"tab-pane"</span> <span class="na">id=</span><span class="s">"settings"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>

                            <span class="nt">&lt;script&gt;</span>
                            <span class="nx">$</span><span class="p">(</span><span class="kd">function</span> <span
                                class="p">()</span> <span class="p">{</span>
                            <span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTab a:last'</span><span class="p">).</span><span
                                class="nx">tab</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span>
                            <span class="p">})</span>
                            <span class="nt">&lt;/script&gt;</span>
                        </code></pre>
                </div>

                <h3>Events</h3>

                <p>When showing a new tab, the events fire in the following order:</p>
                <ol>
                    <li><code>hide.bs.tab</code> (on the current active tab)</li>
                    <li><code>show.bs.tab</code> (on the to-be-shown tab)</li>
                    <li><code>hidden.bs.tab</code> (on the previous active tab, the same one as for the <code>hide.bs.tab</code>
                        event)
                    </li>
                    <li><code>shown.bs.tab</code> (on the newly-active just-shown tab, the same one as for the <code>show.bs.tab</code>
                        event)
                    </li>
                </ol>
                <p>If no tab was already active, then the <code>hide.bs.tab</code> and <code>hidden.bs.tab</code> events
                    will not be fired.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.tab</td>
                            <td>This event fires on tab show, but before the new tab has been shown. Use <code>event.target</code>
                                and <code>event.relatedTarget</code> to target the active tab and the previous active
                                tab (if available) respectively.
                            </td>
                        </tr>
                        <tr>
                            <td>shown.bs.tab</td>
                            <td>This event fires on tab show after a tab has been shown. Use <code>event.target</code>
                                and <code>event.relatedTarget</code> to target the active tab and the previous active
                                tab (if available) respectively.
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.tab</td>
                            <td>This event fires when a new tab is to be shown (and thus the previous active tab is to
                                be hidden). Use <code>event.target</code> and <code>event.relatedTarget</code> to target
                                the current active tab and the new soon-to-be-active tab, respectively.
                            </td>
                        </tr>
                        <tr>
                            <td>hidden.bs.tab</td>
                            <td>This event fires after a new tab is shown (and thus the previous active tab is hidden).
                                Use <code>event.target</code> and <code>event.relatedTarget</code> to target the
                                previous active tab and the new active tab, respectively.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'a[data-toggle="tab"]'</span><span class="p">).</span><span
                                class="nx">on</span><span class="p">(</span><span class="s1">'shown.bs.tab'</span><span
                                class="p">,</span> <span class="kd">function</span> <span class="p">(</span><span
                                class="nx">e</span><span class="p">)</span> <span class="p">{</span>
                            <span class="nx">e</span><span class="p">.</span><span class="nx">target</span> <span
                                class="c1">// newly activated tab</span>
                            <span class="nx">e</span><span class="p">.</span><span class="nx">relatedTarget</span> <span
                                class="c1">// previous active tab</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="tooltips" class="page-header">Tooltips
                    <small>tooltip.js</small>
                </h1>
                <p>Inspired by the excellent jQuery.tipsy plugin written by Jason Frame; Tooltips are an updated
                    version, which don't rely on images, use CSS3 for animations, and data-attributes for local title
                    storage.</p>

                <p>Tooltips with zero-length titles are never displayed.</p>

                <h2 id="tooltips-examples">Examples</h2>

                <p>Hover over the links below to see tooltips:</p>

                <div class="bs-example tooltip-demo">
                    <p class="muted" style="margin-bottom: 0;">Tight pants next level keffiyeh <a
                            href="#" data-toggle="tooltip" title="Default tooltip">you
                            probably</a> haven't heard of them. Photo booth beard raw denim letterpress vegan messenger
                        bag stumptown. Farm-to-table seitan, mcsweeney's fixie sustainable quinoa 8-bit american apparel
                        <a href="#" data-toggle="tooltip" title="Another tooltip">have
                            a</a> terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats.
                        Tofu biodiesel williamsburg marfa, four loko mcsweeney's cleanse vegan chambray. A really ironic
                        artisan <a href="#" data-toggle="tooltip"
                                   title="Another one here too">whatever keytar</a>, scenester farm-to-table banksy
                        Austin <a href="#" data-toggle="tooltip" title="The last tip!">twitter
                            handle</a> freegan cred raw denim single-origin coffee viral.
                    </p>
                </div>
                <!-- /example -->

                <h3>Static tooltip</h3>

                <p>Four options are available: top, right, bottom, and left aligned.</p>

                <div class="bs-example bs-example-tooltip">
                    <div class="tooltip left" role="tooltip">
                        <div class="tooltip-arrow"></div>
                        <div class="tooltip-inner">
                            Tooltip on the left
                        </div>
                    </div>
                    <div class="tooltip top" role="tooltip">
                        <div class="tooltip-arrow"></div>
                        <div class="tooltip-inner">
                            Tooltip on the top
                        </div>
                    </div>
                    <div class="tooltip bottom" role="tooltip">
                        <div class="tooltip-arrow"></div>
                        <div class="tooltip-inner">
                            Tooltip on the bottom
                        </div>
                    </div>
                    <div class="tooltip right" role="tooltip">
                        <div class="tooltip-arrow"></div>
                        <div class="tooltip-inner">
                            Tooltip on the right
                        </div>
                    </div>
                </div>

                <h3>Four directions</h3>

                <div class="bs-example tooltip-demo">
                    <div class="bs-example-tooltips">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left"
                                title="Tooltip on left">Tooltip on left
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                title="Tooltip on top">Tooltip on top
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom"
                                title="Tooltip on bottom">Tooltip on bottom
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                                title="Tooltip on right">Tooltip on right
                        </button>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"btn btn-default"</span> <span class="na">data-toggle=</span><span
                                class="s">"tooltip"</span> <span class="na">data-placement=</span><span
                                class="s">"left"</span> <span class="na">title=</span><span
                                class="s">"Tooltip on left"</span><span class="nt">&gt;</span>Tooltip on left<span
                                class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-toggle=</span><span class="s">"tooltip"</span> <span class="na">data-placement=</span><span
                                class="s">"top"</span> <span class="na">title=</span><span
                                class="s">"Tooltip on top"</span><span class="nt">&gt;</span>Tooltip on top<span
                                class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-toggle=</span><span class="s">"tooltip"</span> <span class="na">data-placement=</span><span
                                class="s">"bottom"</span> <span class="na">title=</span><span class="s">"Tooltip on bottom"</span><span
                                class="nt">&gt;</span>Tooltip on bottom<span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-toggle=</span><span class="s">"tooltip"</span> <span class="na">data-placement=</span><span
                                class="s">"right"</span> <span class="na">title=</span><span class="s">"Tooltip on right"</span><span
                                class="nt">&gt;</span>Tooltip on right<span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>Opt-in functionality</h4>

                    <p>For performance reasons, the Tooltip and Popover data-apis are opt-in, meaning <strong>you must
                            initialize them yourself</strong>.</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Tooltips in button groups and input groups require special setting</h4>

                    <p>When using tooltips on elements within a <code>.btn-group</code> or an <code>.input-group</code>,
                        you'll have to specify the option <code>container: 'body'</code> (documented below) to avoid
                        unwanted side effects (such as the element growing wider and/or losing its rounded corners when
                        the tooltip is triggered).</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Don't try to show tooltips on hidden elements</h4>

                    <p>Invoking <code>$(...).tooltip('show')</code> when the target element is <code>display:
                            none;</code> will cause the tooltip to be incorrectly positioned.</p>
                </div>
                <div class="bs-callout bs-callout-info">
                    <h4>Tooltips on disabled elements require wrapper elements</h4>

                    <p>To add a tooltip to a <code>disabled</code> or <code>.disabled</code> element, put the element
                        inside of a <code>&lt;div&gt;</code> and apply the tooltip to that <code>&lt;div&gt;</code>
                        instead.</p>
                </div>

                <h2 id="tooltips-usage">Usage</h2>

                <p>The tooltip plugin generates content and markup on demand, and by default places tooltips after their
                    trigger element.</p>

                <p>Trigger the tooltip via JavaScript:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#example'</span><span class="p">).</span><span
                                class="nx">tooltip</span><span class="p">(</span><span class="nx">options</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h3>Markup</h3>

                <p>The required markup for a tooltip is only a <code>data</code> attribute and <code>title</code> on the
                    HTML element you wish to have a tooltip. The generated markup of a tooltip is rather simple, though
                    it does require a position (by default, set to <code>top</code> by the plugin).</p>

                <div class="bs-callout bs-callout-warning">
                    <h4>Multiple-line links</h4>

                    <p>Sometimes you want to add a tooltip to a hyperlink that wraps multiple lines. The default
                        behavior of the tooltip plugin is to center it horizontally and vertically. Add <code>white-space:
                            nowrap;</code> to your anchors to avoid this.</p>
                </div>
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="c">&lt;!-- HTML to write --&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span
                                class="na">data-toggle=</span><span class="s">"tooltip"</span> <span
                                class="na">title=</span><span class="s">"Some tooltip text!"</span><span
                                class="nt">&gt;</span>Hover over me<span class="nt">&lt;/a&gt;</span>

                            <span class="c">&lt;!-- Generated markup by the plugin --&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"tooltip top"</span> <span class="na">role=</span><span
                                class="s">"tooltip"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"tooltip-arrow"</span><span
                                class="nt">&gt;&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"tooltip-inner"</span><span
                                class="nt">&gt;</span>
                            Some tooltip text!
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-animation=""</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 100px;">Type</th>
                            <th style="width: 50px;">Default</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>animation</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>Apply a CSS fade transition to the tooltip</td>
                        </tr>
                        <tr>
                            <td>container</td>
                            <td>string | false</td>
                            <td>false</td>
                            <td>
                                <p>Appends the tooltip to a specific element. Example: <code>container: 'body'</code>.
                                    This option is particularly useful in that it allows you to position the tooltip in
                                    the flow of the document near the triggering element -&nbsp;which will prevent the
                                    tooltip from floating away from the triggering element during a window resize.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>delay</td>
                            <td>number | object</td>
                            <td>0</td>
                            <td>
                                <p>Delay showing and hiding the tooltip (ms) - does not apply to manual trigger type</p>

                                <p>If a number is supplied, delay is applied to both hide/show</p>

                                <p>Object structure is: <code>delay: { "show": 500, "hide": 100 }</code></p>
                            </td>
                        </tr>
                        <tr>
                            <td>html</td>
                            <td>boolean</td>
                            <td>false</td>
                            <td>Insert HTML into the tooltip. If false, jQuery's <code>text</code> method will be used
                                to insert content into the DOM. Use text if you're worried about XSS attacks.
                            </td>
                        </tr>
                        <tr>
                            <td>placement</td>
                            <td>string | function</td>
                            <td>'top'</td>
                            <td>
                                <p>How to position the tooltip - top | bottom | left | right | auto.<br>When "auto" is
                                    specified, it will dynamically reorient the tooltip. For example, if placement is
                                    "auto left", the tooltip will display to the left when possible, otherwise it will
                                    display right.</p>

                                <p>When a function is used to determine the placement, it is called with the tooltip DOM
                                    node as its first argument and the triggering element DOM node as its second. The
                                    <code>this</code> context is set to the tooltip instance.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>selector</td>
                            <td>string</td>
                            <td>false</td>
                            <td>If a selector is provided, tooltip objects will be delegated to the specified targets.
                                In practice, this is used to enable dynamic HTML content to have tooltips added. See <a
                                    href="https://github.com/twbs/bootstrap/issues/4215">this</a> and <a
                                    href="http://jsbin.com/zopod/1/edit">an informative example</a>.
                            </td>
                        </tr>
                        <tr>
                            <td>template</td>
                            <td>string</td>
                            <td><code>'&lt;div class="tooltip" role="tooltip"&gt;&lt;div class="tooltip-arrow"&gt;&lt;/div&gt;&lt;div
                                    class="tooltip-inner"&gt;&lt;/div&gt;&lt;/div&gt;'</code></td>
                            <td>
                                <p>Base HTML to use when creating the tooltip.</p>

                                <p>The tooltip's <code>title</code> will be injected into the
                                    <code>.tooltip-inner</code>.</p>

                                <p><code>.tooltip-arrow</code> will become the tooltip's arrow.</p>

                                <p>The outermost wrapper element should have the <code>.tooltip</code> class.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>title</td>
                            <td>string | function</td>
                            <td>''</td>
                            <td>
                                <p>Default title value if <code>title</code> attribute isn't present.</p>

                                <p>If a function is given, it will be called with its <code>this</code> reference set to
                                    the element that the tooltip is attached to.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>trigger</td>
                            <td>string</td>
                            <td>'hover focus'</td>
                            <td>How tooltip is triggered - click | hover | focus | manual. You may pass multiple
                                triggers; separate them with a space.
                            </td>
                        </tr>
                        <tr>
                            <td>viewport</td>
                            <td>string | object</td>
                            <td>{ selector: 'body', padding: 0 }</td>
                            <td>
                                <p>Keeps the tooltip within the bounds of this element. Example: <code>viewport:
                                        '#viewport'</code> or <code>{ "selector": "#viewport", "padding": 0 }</code></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="bs-callout bs-callout-info">
                    <h4>Data attributes for individual tooltips</h4>

                    <p>Options for individual tooltips can alternatively be specified through the use of data
                        attributes, as explained above.</p>
                </div>

                <h3>Methods</h3>

                <h4>$().tooltip(options)</h4>

                <p>Attaches a tooltip handler to an element collection.</p>

                <h4>.tooltip('show')</h4>

                <p>Reveals an element's tooltip. Tooltips with zero-length titles are never displayed.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">tooltip</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.tooltip('hide')</h4>

                <p>Hides an element's tooltip.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">tooltip</span><span class="p">(</span><span class="s1">'hide'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.tooltip('toggle')</h4>

                <p>Toggles an element's tooltip.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">tooltip</span><span class="p">(</span><span class="s1">'toggle'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.tooltip('destroy')</h4>

                <p>Hides and destroys an element's tooltip.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">tooltip</span><span class="p">(</span><span class="s1">'destroy'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h3>Events</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.tooltip</td>
                            <td>This event fires immediately when the <code>show</code> instance method is called.</td>
                        </tr>
                        <tr>
                            <td>shown.bs.tooltip</td>
                            <td>This event is fired when the tooltip has been made visible to the user (will wait for
                                CSS transitions to complete).
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.tooltip</td>
                            <td>This event is fired immediately when the <code>hide</code> instance method has been
                                called.
                            </td>
                        </tr>
                        <tr>
                            <td>hidden.bs.tooltip</td>
                            <td>This event is fired when the tooltip has finished being hidden from the user (will wait
                                for CSS transitions to complete).
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myTooltip'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'hidden.bs.tooltip'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="popovers" class="page-header">Popovers
                    <small>popover.js</small>
                </h1>

                <h2 id="popovers-examples">Examples</h2>

                <p>Add small overlays of content, like those on the iPad, to any element for housing secondary
                    information.</p>

                <p>Popovers whose both title and content are zero-length are never displayed.</p>

                <div class="bs-callout bs-callout-danger">
                    <h4>Plugin dependency</h4>

                    <p>Popovers require the <a href="#tooltips">tooltip plugin</a> to
                        be included in your version of Bootstrap.</p>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Opt-in functionality</h4>

                    <p>For performance reasons, the Tooltip and Popover data-apis are opt-in, meaning <strong>you must
                            initialize them yourself</strong>.</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Popovers in button groups and input groups require special setting</h4>

                    <p>When using popovers on elements within a <code>.btn-group</code> or an <code>.input-group</code>,
                        you'll have to specify the option <code>container: 'body'</code> (documented below) to avoid
                        unwanted side effects (such as the element growing wider and/or losing its rounded corners when
                        the popover is triggered).</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Don't try to show popovers on hidden elements</h4>

                    <p>Invoking <code>$(...).popover('show')</code> when the target element is <code>display:
                            none;</code> will cause the popover to be incorrectly positioned.</p>
                </div>
                <div class="bs-callout bs-callout-info">
                    <h4>Popovers on disabled elements require wrapper elements</h4>

                    <p>To add a popover to a <code>disabled</code> or <code>.disabled</code> element, put the element
                        inside of a <code>&lt;div&gt;</code> and apply the popover to that <code>&lt;div&gt;</code>
                        instead.</p>
                </div>
                <div class="bs-callout bs-callout-info">
                    <h4>Multiple-line links</h4>

                    <p>Sometimes you want to add a popover to a hyperlink that wraps multiple lines. The default
                        behavior of the popover plugin is to center it horizontally and vertically. Add <code>white-space:
                            nowrap;</code> to your anchors to avoid this.</p>
                </div>

                <h3>Static popover</h3>

                <p>Four options are available: top, right, bottom, and left aligned.</p>

                <div class="bs-example bs-example-popover">
                    <div class="popover top">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover top</h3>

                        <div class="popover-content">
                            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                lacinia quam venenatis vestibulum.</p>
                        </div>
                    </div>

                    <div class="popover right">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover right</h3>

                        <div class="popover-content">
                            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                lacinia quam venenatis vestibulum.</p>
                        </div>
                    </div>

                    <div class="popover bottom">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover bottom</h3>

                        <div class="popover-content">
                            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                lacinia quam venenatis vestibulum.</p>
                        </div>
                    </div>

                    <div class="popover left">
                        <div class="arrow"></div>
                        <h3 class="popover-title">Popover left</h3>

                        <div class="popover-content">
                            <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem
                                lacinia quam venenatis vestibulum.</p>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <h3>Live demo</h3>

                <div class="bs-example" style="padding-bottom: 24px;">
                    <button type="button" class="btn btn-lg btn-danger bs-docs-popover" data-toggle="popover" title=""
                            data-content="And here&#39;s some amazing content. It&#39;s very engaging. Right?"
                            data-original-title="Popover title">Click to toggle popover
                    </button>
                </div>
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"btn btn-lg btn-danger"</span> <span class="na">data-toggle=</span><span
                                class="s">"popover"</span> <span class="na">title=</span><span
                                class="s">"Popover title"</span> <span class="na">data-content=</span><span class="s">"And here's some amazing content. It's very engaging. Right?"</span><span
                                class="nt">&gt;</span>Click to toggle popover<span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <h4>Four directions</h4>

                <div class="bs-example popover-demo">
                    <div class="bs-example-popovers">
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                                data-placement="left"
                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on left
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                                data-placement="top"
                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on top
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                                data-placement="bottom"
                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on bottom
                        </button>
                        <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                                data-placement="right"
                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                            Popover on right
                        </button>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"btn btn-default"</span> <span class="na">data-container=</span><span
                                class="s">"body"</span> <span class="na">data-toggle=</span><span
                                class="s">"popover"</span> <span class="na">data-placement=</span><span
                                class="s">"left"</span> <span class="na">data-content=</span><span class="s">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus."</span><span
                                class="nt">&gt;</span>
                            Popover on left
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-container=</span><span class="s">"body"</span> <span class="na">data-toggle=</span><span
                                class="s">"popover"</span> <span class="na">data-placement=</span><span
                                class="s">"top"</span> <span class="na">data-content=</span><span class="s">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus."</span><span
                                class="nt">&gt;</span>
                            Popover on top
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-container=</span><span class="s">"body"</span> <span class="na">data-toggle=</span><span
                                class="s">"popover"</span> <span class="na">data-placement=</span><span class="s">"bottom"</span>
                            <span class="na">data-content=</span><span class="s">"Vivamus</span>
                            <span class="s">sagittis lacus vel augue laoreet rutrum faucibus."</span><span class="nt">&gt;</span>
                            Popover on bottom
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;button</span> <span class="na">type=</span><span
                                class="s">"button"</span> <span class="na">class=</span><span class="s">"btn btn-default"</span>
                            <span class="na">data-container=</span><span class="s">"body"</span> <span class="na">data-toggle=</span><span
                                class="s">"popover"</span> <span class="na">data-placement=</span><span class="s">"right"</span>
                            <span class="na">data-content=</span><span class="s">"Vivamus sagittis lacus vel augue laoreet rutrum faucibus."</span><span
                                class="nt">&gt;</span>
                            Popover on right
                            <span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <h4>Dismiss on next click</h4>

                <p>Use the <code>focus</code> trigger to dismiss popovers on the next click that the user makes.</p>

                <div class="bs-callout bs-callout-danger">
                    <h4>Specific markup required for dismiss-on-next-click</h4>

                    <p>For proper cross-browser and cross-platform behavior, you must use the <code>&lt;a&gt;</code>
                        tag, <i>not</i> the <code>&lt;button&gt;</code> tag, and you also must include a <a
                            href="https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes#tabindex"><code>tabindex</code></a>
                        attribute.</p>
                </div>
                <div class="bs-example" style="padding-bottom: 24px;">
                    <a href="#" tabindex="0"
                       class="btn btn-lg btn-danger bs-docs-popover" role="button" data-toggle="popover"
                       data-trigger="focus" title=""
                       data-content="And here&#39;s some amazing content. It&#39;s very engaging. Right?"
                       data-original-title="Dismissible popover">Dismissible popover</a>
                </div>
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;a</span> <span
                                class="na">href=</span><span class="s">"#"</span> <span class="na">tabindex=</span><span
                                class="s">"0"</span> <span class="na">class=</span><span class="s">"btn btn-lg btn-danger"</span>
                            <span class="na">role=</span><span class="s">"button"</span> <span
                                class="na">data-toggle=</span><span class="s">"popover"</span> <span class="na">data-trigger=</span><span
                                class="s">"focus"</span> <span class="na">title=</span><span class="s">"Dismissible popover"</span>
                            <span class="na">data-content=</span><span class="s">"And here's some amazing content. It's very engaging. Right?"</span><span
                                class="nt">&gt;</span>Dismissible popover<span class="nt">&lt;/a&gt;</span>
                        </code></pre>
                </div>


                <h2 id="popovers-usage">Usage</h2>

                <p>Enable popovers via JavaScript:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#example'</span><span class="p">).</span><span
                                class="nx">popover</span><span class="p">(</span><span class="nx">options</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-animation=""</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 100px;">Type</th>
                            <th style="width: 50px;">Default</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>animation</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>Apply a CSS fade transition to the popover</td>
                        </tr>
                        <tr>
                            <td>container</td>
                            <td>string | false</td>
                            <td>false</td>
                            <td>
                                <p>Appends the popover to a specific element. Example: <code>container: 'body'</code>.
                                    This option is particularly useful in that it allows you to position the popover in
                                    the flow of the document near the triggering element -&nbsp;which will prevent the
                                    popover from floating away from the triggering element during a window resize.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>content</td>
                            <td>string | function</td>
                            <td>''</td>
                            <td>
                                <p>Default content value if <code>data-content</code> attribute isn't present.</p>

                                <p>If a function is given, it will be called with its <code>this</code> reference set to
                                    the element that the popover is attached to.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>delay</td>
                            <td>number | object</td>
                            <td>0</td>
                            <td>
                                <p>Delay showing and hiding the popover (ms) - does not apply to manual trigger type</p>

                                <p>If a number is supplied, delay is applied to both hide/show</p>

                                <p>Object structure is: <code>delay: { "show": 500, "hide": 100 }</code></p>
                            </td>
                        </tr>
                        <tr>
                            <td>html</td>
                            <td>boolean</td>
                            <td>false</td>
                            <td>Insert HTML into the popover. If false, jQuery's <code>text</code> method will be used
                                to insert content into the DOM. Use text if you're worried about XSS attacks.
                            </td>
                        </tr>
                        <tr>
                            <td>placement</td>
                            <td>string | function</td>
                            <td>'right'</td>
                            <td>
                                <p>How to position the popover - top | bottom | left | right | auto.<br>When "auto" is
                                    specified, it will dynamically reorient the popover. For example, if placement is
                                    "auto left", the popover will display to the left when possible, otherwise it will
                                    display right.</p>

                                <p>When a function is used to determine the placement, it is called with the popover DOM
                                    node as its first argument and the triggering element DOM node as its second. The
                                    <code>this</code> context is set to the popover instance.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>selector</td>
                            <td>string</td>
                            <td>false</td>
                            <td>If a selector is provided, popover objects will be delegated to the specified targets.
                                In practice, this is used to enable dynamic HTML content to have popovers added. See <a
                                    href="https://github.com/twbs/bootstrap/issues/4215">this</a> and <a
                                    href="http://jsbin.com/zopod/1/edit">an informative example</a>.
                            </td>
                        </tr>
                        <tr>
                            <td>template</td>
                            <td>string</td>
                            <td><code>'&lt;div class="popover" role="tooltip"&gt;&lt;div class="arrow"&gt;&lt;/div&gt;&lt;h3
                                    class="popover-title"&gt;&lt;/h3&gt;&lt;div class="popover-content"&gt;&lt;/div&gt;&lt;/div&gt;'</code>
                            </td>
                            <td>
                                <p>Base HTML to use when creating the popover.</p>

                                <p>The popover's <code>title</code> will be injected into the
                                    <code>.popover-title</code>.</p>

                                <p>The popover's <code>content</code> will be injected into the
                                    <code>.popover-content</code>.</p>

                                <p><code>.arrow</code> will become the popover's arrow.</p>

                                <p>The outermost wrapper element should have the <code>.popover</code> class.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>title</td>
                            <td>string | function</td>
                            <td>''</td>
                            <td>
                                <p>Default title value if <code>title</code> attribute isn't present.</p>

                                <p>If a function is given, it will be called with its <code>this</code> reference set to
                                    the element that the popover is attached to.</p>
                            </td>
                        </tr>
                        <tr>
                            <td>trigger</td>
                            <td>string</td>
                            <td>'click'</td>
                            <td>How popover is triggered - click | hover | focus | manual. You may pass multiple
                                triggers; separate them with a space.
                            </td>
                        </tr>
                        <tr>
                            <td>viewport</td>
                            <td>string | object</td>
                            <td>{ selector: 'body', padding: 0 }</td>
                            <td>
                                <p>Keeps the popover within the bounds of this element. Example: <code>viewport:
                                        '#viewport'</code> or <code>{ "selector": "#viewport", "padding": 0 }</code></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="bs-callout bs-callout-info">
                    <h4>Data attributes for individual popovers</h4>

                    <p>Options for individual popovers can alternatively be specified through the use of data
                        attributes, as explained above.</p>
                </div>

                <h3>Methods</h3>
                <h4>$().popover(options)</h4>

                <p>Initializes popovers for an element collection.</p>

                <h4>.popover('show')</h4>

                <p>Reveals an element's popover. Popovers whose both title and content are zero-length are never
                    displayed.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">popover</span><span class="p">(</span><span class="s1">'show'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.popover('hide')</h4>

                <p>Hides an element's popover.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">popover</span><span class="p">(</span><span class="s1">'hide'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.popover('toggle')</h4>

                <p>Toggles an element's popover.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">popover</span><span class="p">(</span><span class="s1">'toggle'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>

                <h4>.popover('destroy')</h4>

                <p>Hides and destroys an element's popover.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#element'</span><span class="p">).</span><span
                                class="nx">popover</span><span class="p">(</span><span class="s1">'destroy'</span><span
                                class="p">)</span>
                        </code></pre>
                </div>
                <h3>Events</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.popover</td>
                            <td>This event fires immediately when the <code>show</code> instance method is called.</td>
                        </tr>
                        <tr>
                            <td>shown.bs.popover</td>
                            <td>This event is fired when the popover has been made visible to the user (will wait for
                                CSS transitions to complete).
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.popover</td>
                            <td>This event is fired immediately when the <code>hide</code> instance method has been
                                called.
                            </td>
                        </tr>
                        <tr>
                            <td>hidden.bs.popover</td>
                            <td>This event is fired when the popover has finished being hidden from the user (will wait
                                for CSS transitions to complete).
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myPopover'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'hidden.bs.popover'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="alerts" class="page-header">警告框
                    <small>alert.js</small>
                </h1>

                <h2 id="alerts-examples">警告框实例</h2>

                <p>Add dismiss functionality to all alert messages with this plugin.</p>

                <p>When using a <code>.close</code> button, it must be the first child of the
                    <code>.alert-dismissible</code> and no text content may come before it in the markup.</p>

                <div class="bs-example bs-example-standalone">
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                        <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                    </div>

                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                        <h4>Oh snap! You got an error!</h4>

                        <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor
                            ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet
                            fermentum.</p>

                        <p>
                            <button type="button" class="btn btn-danger">Take this action</button>
                            <button type="button" class="btn btn-default">Or do this</button>
                        </p>
                    </div>
                </div>
                <!-- /example -->


                <h2 id="alerts-usage">用法</h2>

                <p>Just add <code>data-dismiss="alert"</code> to your close button to automatically give an alert close
                    functionality. Closing an alert removes it from the DOM.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"close"</span> <span
                                class="na">data-dismiss=</span><span class="s">"alert"</span><span class="nt">&gt;&lt;span</span>
                            <span class="na">aria-hidden=</span><span class="s">"true"</span><span
                                class="nt">&gt;</span><span class="ni">&amp;times;</span><span class="nt">&lt;/span&gt;&lt;span</span>
                            <span class="na">class=</span><span class="s">"sr-only"</span><span class="nt">&gt;</span>Close<span
                                class="nt">&lt;/span&gt;&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"close"</span> <span
                                class="na">data-dismiss=</span><span class="s">"alert"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">aria-hidden=</span><span
                                class="s">"true"</span><span class="nt">&gt;</span><span
                                class="ni">&amp;times;</span><span class="nt">&lt;/span&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span
                                class="s">"sr-only"</span><span class="nt">&gt;</span>Close<span class="nt">&lt;/span&gt;</span>
                            <span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>

                <p>To have your alerts use animation when closing, make sure they have the <code>.fade</code> and <code>.in</code>
                    classes already applied to them.</p>

                <h3>Methods</h3>

                <h4>$().alert()</h4>

                <p>Makes an alert listen for click events on descendant elements which have the <code>data-dismiss="alert"</code>
                    attribute. (Not necessary when using the data-api's auto-initialization.)</p>

                <h4>$().alert('close')</h4>

                <p>Closes an alert by removing it from the DOM. If the <code>.fade</code> and <code>.in</code> classes
                    are present on the element, the alert will fade out before it is removed.</p>


                <h3>Events</h3>

                <p>Bootstrap's alert plugin exposes a few events for hooking into alert functionality.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>close.bs.alert</td>
                            <td>This event fires immediately when the <code>close</code> instance method is called.</td>
                        </tr>
                        <tr>
                            <td>closed.bs.alert</td>
                            <td>This event is fired when the alert has been closed (will wait for CSS transitions to
                                complete).
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myAlert'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'closed.bs.alert'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="buttons" class="page-header">Buttons
                    <small>button.js</small>
                </h1>

                <p class="lead">Do more with buttons. Control button states or create groups of buttons for more
                    components like toolbars.</p>

                <div class="bs-callout bs-callout-danger">
                    <h4>Cross-browser compatibility</h4>

                    <p><a href="https://github.com/twbs/bootstrap/issues/793">Firefox persists form control states
                            (disabledness and checkedness) across page loads</a>. A workaround for this is to use <code>autocomplete="off"</code>.
                        See <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=654072">Mozilla bug #654072</a>.</p>
                </div>

                <h2 id="buttons-stateful">Stateful</h2>

                <p>Add <code>data-loading-text="Loading..."</code> to use a loading state on a button.</p>

                <div class="bs-callout bs-callout-info">
                    <h4>Use whichever state you like!</h4>

                    <p>For the sake of this demonstration, we are using <code>data-loading-text</code> and <code>$().button('loading')</code>,
                        but that's not the only state you can use. <a
                            href="#buttons-methods">See more on this below in the
                            <code>$().button(string)</code> documentation</a>.</p>
                </div>
                <div class="bs-example">
                    <button type="button" id="loading-example-btn" data-loading-text="Loading..."
                            class="btn btn-primary" autocomplete="off">
                        Loading state
                    </button>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span class="na">id=</span><span
                                class="s">"myButton"</span> <span class="na">data-loading-text=</span><span class="s">"Loading..."</span>
                            <span class="na">class=</span><span class="s">"btn btn-primary"</span> <span class="na">autocomplete=</span><span
                                class="s">"off"</span><span class="nt">&gt;</span>
                            Loading state
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;script&gt;</span>
                            <span class="nx">$</span><span class="p">(</span><span class="s1">'#myButton'</span><span
                                class="p">).</span><span class="nx">on</span><span class="p">(</span><span class="s1">'click'</span><span
                                class="p">,</span> <span class="kd">function</span> <span class="p">()</span> <span
                                class="p">{</span>
                            <span class="kd">var</span> <span class="nx">$btn</span> <span class="o">=</span> <span
                                class="nx">$</span><span class="p">(</span><span class="k">this</span><span
                                class="p">).</span><span class="nx">button</span><span class="p">(</span><span
                                class="s1">'loading'</span><span class="p">)</span>
                            <span class="c1">// business logic...</span>
                            <span class="nx">$btn</span><span class="p">.</span><span class="nx">button</span><span
                                class="p">(</span><span class="s1">'reset'</span><span class="p">)</span>
                            <span class="p">})</span>
                            <span class="nt">&lt;/script&gt;</span>
                        </code></pre>
                </div>

                <h2 id="buttons-single-toggle">Single toggle</h2>

                <p>Add <code>data-toggle="button"</code> to activate toggling on a single button.</p>

                <div class="bs-example">
                    <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
                            autocomplete="off">
                        Single toggle
                    </button>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"btn btn-primary"</span> <span class="na">data-toggle=</span><span
                                class="s">"button"</span> <span class="na">aria-pressed=</span><span
                                class="s">"false"</span> <span class="na">autocomplete=</span><span
                                class="s">"off"</span><span class="nt">&gt;</span>
                            Single toggle
                            <span class="nt">&lt;/button&gt;</span>
                        </code></pre>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Pre-toggled buttons need <code>.active</code> and <code>aria-pressed="true"</code></h4>

                    <p>For pre-toggled buttons, you must add the <code>.active</code> class and the <code>aria-pressed="true"</code>
                        attribute to the <code>button</code> yourself.</p>
                </div>

                <h2 id="buttons-checkbox-radio">Checkbox / Radio</h2>

                <p>Add <code>data-toggle="buttons"</code> to a <code>.btn-group</code> containing checkbox or radio
                    inputs to enable toggling in their respective styles.</p>

                <div class="bs-callout bs-callout-warning">
                    <h4>Preselected options need <code>.active</code></h4>

                    <p>For preselected options, you must add the <code>.active</code> class to the input's
                        <code>label</code> yourself.</p>
                </div>
                <div class="bs-callout bs-callout-warning">
                    <h4>Visual checked state only updated on click</h4>

                    <p>If the checked state of a checkbox button is updated without firing a <code>click</code> event on
                        the button (e.g. via <code>&lt;input type="reset"&gt;</code> or via setting the
                        <code>checked</code> property of the input), you will need to toggle the <code>.active</code>
                        class on the input's <code>label</code> yourself.</p>
                </div>
                <div class="bs-example">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="checkbox" checked="" autocomplete="off"> Checkbox 1 (pre-checked)
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" autocomplete="off"> Checkbox 2
                        </label>
                        <label class="btn btn-primary">
                            <input type="checkbox" autocomplete="off"> Checkbox 3
                        </label>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"btn-group"</span> <span
                                class="na">data-toggle=</span><span class="s">"buttons"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary active"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"checkbox"</span> <span class="na">autocomplete=</span><span
                                class="s">"off"</span> <span class="na">checked</span><span class="nt">&gt;</span>
                            Checkbox 1 (pre-checked)
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"checkbox"</span> <span class="na">autocomplete=</span><span
                                class="s">"off"</span><span class="nt">&gt;</span> Checkbox 2
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"checkbox"</span> <span class="na">autocomplete=</span><span
                                class="s">"off"</span><span class="nt">&gt;</span> Checkbox 3
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-example">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked=""> Radio 1
                            (preselected)
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Radio 2
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Radio 3
                        </label>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"btn-group"</span> <span
                                class="na">data-toggle=</span><span class="s">"buttons"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary active"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"radio"</span> <span class="na">name=</span><span class="s">"options"</span>
                            <span class="na">id=</span><span class="s">"option1"</span> <span
                                class="na">autocomplete=</span><span class="s">"off"</span> <span
                                class="na">checked</span><span class="nt">&gt;</span> Radio 1 (preselected)
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"radio"</span> <span class="na">name=</span><span class="s">"options"</span>
                            <span class="na">id=</span><span class="s">"option2"</span> <span
                                class="na">autocomplete=</span><span class="s">"off"</span><span class="nt">&gt;</span>
                            Radio 2
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;label</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;input</span> <span class="na">type=</span><span
                                class="s">"radio"</span> <span class="na">name=</span><span class="s">"options"</span>
                            <span class="na">id=</span><span class="s">"option3"</span> <span
                                class="na">autocomplete=</span><span class="s">"off"</span><span class="nt">&gt;</span>
                            Radio 3
                            <span class="nt">&lt;/label&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h2 id="buttons-methods">Methods</h2>

                <h4>$().button('toggle')</h4>

                <p>Toggles push state. Gives the button the appearance that it has been activated.</p>

                <h4>$().button('reset')</h4>

                <p>Resets button state - swaps text to original text.</p>

                <h4>$().button(string)</h4>

                <p>Swaps text to any data defined text state.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span class="na">id=</span><span
                                class="s">"myStateButton"</span> <span class="na">data-complete-text=</span><span
                                class="s">"finished!"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span>
                            <span class="na">autocomplete=</span><span class="s">"off"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;script&gt;</span>
                            <span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myStateButton'</span><span class="p">).</span><span
                                class="nx">on</span><span class="p">(</span><span class="s1">'click'</span><span
                                class="p">,</span> <span class="kd">function</span> <span class="p">()</span> <span
                                class="p">{</span>
                            <span class="nx">$</span><span class="p">(</span><span class="k">this</span><span class="p">).</span><span
                                class="nx">button</span><span class="p">(</span><span class="s1">'complete'</span><span
                                class="p">)</span> <span class="c1">// button text will be "finished!"</span>
                            <span class="p">})</span>
                            <span class="nt">&lt;/script&gt;</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="collapse" class="page-header">Collapse
                    <small>collapse.js</small>
                </h1>

                <h3>About</h3>

                <p>Get base styles and flexible support for collapsible components like accordions and navigation.</p>

                <div class="bs-callout bs-callout-danger">
                    <h4>Plugin dependency</h4>

                    <p>Collapse requires the <a href="#transitions">transitions
                            plugin</a> to be included in your version of Bootstrap.</p>
                </div>

                <h2 id="collapse-examples">Example accordion</h2>

                <p>Using the collapse plugin, we built a simple accordion by extending the panel component.</p>

                <div class="bs-example">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseOne" aria-expanded="true"
                                       aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false"
                                       aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-expanded="false"
                                       aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"panel-group"</span> <span class="na">id=</span><span
                                class="s">"accordion"</span> <span class="na">role=</span><span
                                class="s">"tablist"</span> <span class="na">aria-multiselectable=</span><span class="s">"true"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel panel-default"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel-heading"</span>
                            <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span
                                class="s">"headingOne"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;h4</span> <span class="na">class=</span><span
                                class="s">"panel-title"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">data-toggle=</span><span
                                class="s">"collapse"</span> <span class="na">data-parent=</span><span class="s">"#accordion"</span>
                            <span class="na">href=</span><span class="s">"#collapseOne"</span> <span class="na">aria-expanded=</span><span
                                class="s">"true"</span> <span class="na">aria-controls=</span><span class="s">"collapseOne"</span><span
                                class="nt">&gt;</span>
                            Collapsible Group Item #1
                            <span class="nt">&lt;/a&gt;</span>
                            <span class="nt">&lt;/h4&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">id=</span><span
                                class="s">"collapseOne"</span> <span class="na">class=</span><span class="s">"panel-collapse collapse in"</span>
                            <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"headingOne"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"panel-body"</span><span class="nt">&gt;</span>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel panel-default"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel-heading"</span>
                            <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span
                                class="s">"headingTwo"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;h4</span> <span class="na">class=</span><span
                                class="s">"panel-title"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">class=</span><span
                                class="s">"collapsed"</span> <span class="na">data-toggle=</span><span class="s">"collapse"</span>
                            <span class="na">data-parent=</span><span class="s">"#accordion"</span> <span class="na">href=</span><span
                                class="s">"#collapseTwo"</span> <span class="na">aria-expanded=</span><span class="s">"false"</span>
                            <span class="na">aria-controls=</span><span class="s">"collapseTwo"</span><span class="nt">&gt;</span>
                            Collapsible Group Item #2
                            <span class="nt">&lt;/a&gt;</span>
                            <span class="nt">&lt;/h4&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">id=</span><span
                                class="s">"collapseTwo"</span> <span class="na">class=</span><span class="s">"panel-collapse collapse"</span>
                            <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"headingTwo"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"panel-body"</span><span class="nt">&gt;</span>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel panel-default"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"panel-heading"</span>
                            <span class="na">role=</span><span class="s">"tab"</span> <span class="na">id=</span><span
                                class="s">"headingThree"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;h4</span> <span class="na">class=</span><span
                                class="s">"panel-title"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">class=</span><span
                                class="s">"collapsed"</span> <span class="na">data-toggle=</span><span class="s">"collapse"</span>
                            <span class="na">data-parent=</span><span class="s">"#accordion"</span> <span class="na">href=</span><span
                                class="s">"#collapseThree"</span> <span class="na">aria-expanded=</span><span class="s">"false"</span>
                            <span class="na">aria-controls=</span><span class="s">"collapseThree"</span><span
                                class="nt">&gt;</span>
                            Collapsible Group Item #3
                            <span class="nt">&lt;/a&gt;</span>
                            <span class="nt">&lt;/h4&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">id=</span><span
                                class="s">"collapseThree"</span> <span class="na">class=</span><span class="s">"panel-collapse collapse"</span>
                            <span class="na">role=</span><span class="s">"tabpanel"</span> <span class="na">aria-labelledby=</span><span
                                class="s">"headingThree"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"panel-body"</span><span class="nt">&gt;</span>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <p>It's also possible to swap out <code>.panel-body</code>s with <code>.list-group</code>s.</p>

                <div class="panel-group" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse"
                                   href="#collapseListGroup1" aria-expanded="false"
                                   aria-controls="collapseListGroup1">
                                    Collapsible list group
                                </a>
                            </h4>
                        </div>
                        <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="collapseListGroupHeading1">
                            <ul class="list-group">
                                <li class="list-group-item">Bootply</li>
                                <li class="list-group-item">One itmus ac facilin</li>
                                <li class="list-group-item">Second eros</li>
                            </ul>
                            <div class="panel-footer">Footer</div>
                        </div>
                    </div>
                </div>

                <p>You can also use the plugin without the accordion markup. Make a button toggle the expanding and
                    collapsing of another element.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;button</span> <span
                                class="na">type=</span><span class="s">"button"</span> <span
                                class="na">class=</span><span class="s">"btn btn-danger"</span> <span class="na">data-toggle=</span><span
                                class="s">"collapse"</span> <span class="na">data-target=</span><span
                                class="s">"#demo"</span> <span class="na">aria-expanded=</span><span
                                class="s">"true"</span> <span class="na">aria-controls=</span><span
                                class="s">"demo"</span><span class="nt">&gt;</span>
                            simple collapsible
                            <span class="nt">&lt;/button&gt;</span>

                            <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"demo"</span>
                            <span class="na">class=</span><span class="s">"collapse in"</span><span
                                class="nt">&gt;</span>...<span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-warning">
                    <h4>Make expand/collapse controls accessible</h4>

                    <p>Be sure to add <code>aria-expanded</code> to the control element. This attribute explicitly
                        defines the current state of the collapsible element to screen readers and similar assistive
                        technologies. If the collapsible element is closed by default, it should have a value of <code>aria-expanded="false"</code>.
                        If you've set the collapsible element to be open by default using the <code>in</code> class, set
                        <code>aria-expanded="true"</code> on the control instead. The plugin will automatically toggle
                        this attribute based on whether or not the collapsible element has been opened or closed.</p>

                    <p>Additionally, if your control element is targetting a single collapsible element – i.e. the
                        <code>data-target</code> attribute is pointing to an <code>id</code> selector – you may add an
                        additional <code>aria-controls</code> attribute to the control element, containing the
                        <code>id</code> of the collapsible element. Modern screen readers and similar assistive
                        technologies make use of this attribute to provide users with additional shortcuts to navigate
                        directly to the collapsible element itself.</p>
                </div>

                <h2 id="collapse-usage">Usage</h2>

                <p>The collapse plugin utilizes a few classes to handle the heavy lifting:</p>
                <ul>
                    <li><code>.collapse</code> hides the content</li>
                    <li><code>.collapse.in</code> shows the content</li>
                    <li><code>.collapsing</code> is added when the transition starts, and removed when it finishes</li>
                </ul>
                <p>These classes can be found in <code>component-animations.less</code>.</p>

                <h3>Via data attributes</h3>

                <p>Just add <code>data-toggle="collapse"</code> and a <code>data-target</code> to the element to
                    automatically assign control of a collapsible element. The <code>data-target</code> attribute
                    accepts a CSS selector to apply the collapse to. Be sure to add the class <code>collapse</code> to
                    the collapsible element. If you'd like it to default open, add the additional class <code>in</code>.
                </p>

                <p>To add accordion-like group management to a collapsible control, add the data attribute <code>data-parent="#selector"</code>.
                    Refer to the demo to see this in action.</p>

                <h3>Via JavaScript</h3>

                <p>Enable manually with:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'.collapse'</span><span class="p">).</span><span
                                class="nx">collapse</span><span class="p">()</span>
                        </code></pre>
                </div>

                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-parent=""</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 50px;">type</th>
                            <th style="width: 50px;">default</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>parent</td>
                            <td>selector</td>
                            <td>false</td>
                            <td>If a selector is provided, then all collapsible elements under the specified parent will
                                be closed when this collapsible item is shown. (similar to traditional accordion
                                behavior - this is dependent on the <code>panel</code> class)
                            </td>
                        </tr>
                        <tr>
                            <td>toggle</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>Toggles the collapsible element on invocation</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

                <h3>Methods</h3>

                <h4>.collapse(options)</h4>

                <p>Activates your content as a collapsible element. Accepts an optional options <code>object</code>.
                </p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myCollapsible'</span><span class="p">).</span><span
                                class="nx">collapse</span><span class="p">({</span>
                            <span class="nx">toggle</span><span class="o">:</span> <span class="kc">false</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>

                <h4>.collapse('toggle')</h4>

                <p>Toggles a collapsible element to shown or hidden.</p>

                <h4>.collapse('show')</h4>

                <p>Shows a collapsible element.</p>

                <h4>.collapse('hide')</h4>

                <p>Hides a collapsible element.</p>

                <h3>Events</h3>

                <p>Bootstrap's collapse class exposes a few events for hooking into collapse functionality.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>show.bs.collapse</td>
                            <td>This event fires immediately when the <code>show</code> instance method is called.</td>
                        </tr>
                        <tr>
                            <td>shown.bs.collapse</td>
                            <td>This event is fired when a collapse element has been made visible to the user (will wait
                                for CSS transitions to complete).
                            </td>
                        </tr>
                        <tr>
                            <td>hide.bs.collapse</td>
                            <td>
                                This event is fired immediately when the <code>hide</code> method has been called.
                            </td>
                        </tr>
                        <tr>
                            <td>hidden.bs.collapse</td>
                            <td>This event is fired when a collapse element has been hidden from the user (will wait for
                                CSS transitions to complete).
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myCollapsible'</span><span class="p">).</span><span
                                class="nx">on</span><span class="p">(</span><span class="s1">'hidden.bs.collapse'</span><span
                                class="p">,</span> <span class="kd">function</span> <span class="p">()</span> <span
                                class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="carousel" class="page-header">Carousel
                    <small>carousel.js</small>
                </h1>

                <p>A slideshow component for cycling through elemnts, like a carousel. <strong>Nested carousels are not
                        supported.</strong></p>

                <h2 id="carousel-examples">Examples</h2>

                <div class="bs-example">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#777:#555/text:First slide"
                                     alt="First slide [900x500]"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyIvPjxnPjx0ZXh0IHg9IjMxNy43MzQzNzUiIHk9IjI1MCIgc3R5bGU9ImZpbGw6IzU1NTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZTo0MnB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPkZpcnN0IHNsaWRlPC90ZXh0PjwvZz48L3N2Zz4="
                                     data-holder-rendered="true">
                            </div>
                            <div class="item active">
                                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide"
                                     alt="Second slide [900x500]"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjI3Ny4yODEyNSIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNDQ0O2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjQycHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0PjwvZz48L3N2Zz4="
                                     data-holder-rendered="true">
                            </div>
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#555:#333/text:Third slide"
                                     alt="Third slide [900x500]"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSIvPjxnPjx0ZXh0IHg9IjMwOC40MjE4NzUiIHk9IjI1MCIgc3R5bGU9ImZpbGw6IzMzMztmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZTo0MnB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPlRoaXJkIHNsaWRlPC90ZXh0PjwvZz48L3N2Zz4="
                                     data-holder-rendered="true">
                            </div>
                        </div>
                        <a class="left carousel-control"
                           href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control"
                           href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">id=</span><span class="s">"carousel-example-generic"</span> <span class="na">class=</span><span
                                class="s">"carousel slide"</span> <span class="na">data-ride=</span><span class="s">"carousel"</span><span
                                class="nt">&gt;</span>
                            <span class="c">&lt;!-- Indicators --&gt;</span>
                            <span class="nt">&lt;ol</span> <span class="na">class=</span><span class="s">"carousel-indicators"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">data-target=</span><span class="s">"#carousel-example-generic"</span>
                            <span class="na">data-slide-to=</span><span class="s">"0"</span> <span
                                class="na">class=</span><span class="s">"active"</span><span
                                class="nt">&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">data-target=</span><span class="s">"#carousel-example-generic"</span>
                            <span class="na">data-slide-to=</span><span class="s">"1"</span><span class="nt">&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;li</span> <span class="na">data-target=</span><span class="s">"#carousel-example-generic"</span>
                            <span class="na">data-slide-to=</span><span class="s">"2"</span><span class="nt">&gt;&lt;/li&gt;</span>
                            <span class="nt">&lt;/ol&gt;</span>

                            <span class="c">&lt;!-- Wrapper for slides --&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"carousel-inner"</span>
                            <span class="na">role=</span><span class="s">"listbox"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"item active"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;img</span> <span class="na">src=</span><span class="s">"..."</span>
                            <span class="na">alt=</span><span class="s">"..."</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"carousel-caption"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"item"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;img</span> <span class="na">src=</span><span class="s">"..."</span>
                            <span class="na">alt=</span><span class="s">"..."</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"carousel-caption"</span><span
                                class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>

                            <span class="c">&lt;!-- Controls --&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">class=</span><span class="s">"left carousel-control"</span>
                            <span class="na">href=</span><span class="s">"#carousel-example-generic"</span> <span
                                class="na">role=</span><span class="s">"button"</span> <span
                                class="na">data-slide=</span><span class="s">"prev"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-chevron-left"</span><span
                                class="nt">&gt;&lt;/span&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span
                                class="s">"sr-only"</span><span class="nt">&gt;</span>Previous<span class="nt">&lt;/span&gt;</span>
                            <span class="nt">&lt;/a&gt;</span>
                            <span class="nt">&lt;a</span> <span class="na">class=</span><span class="s">"right carousel-control"</span>
                            <span class="na">href=</span><span class="s">"#carousel-example-generic"</span> <span
                                class="na">role=</span><span class="s">"button"</span> <span
                                class="na">data-slide=</span><span class="s">"next"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"glyphicon glyphicon-chevron-right"</span><span
                                class="nt">&gt;&lt;/span&gt;</span>
                            <span class="nt">&lt;span</span> <span class="na">class=</span><span
                                class="s">"sr-only"</span><span class="nt">&gt;</span>Next<span
                                class="nt">&lt;/span&gt;</span>
                            <span class="nt">&lt;/a&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-warning" id="callout-carousel-transitions">
                    <h4>Transition animations not supported in Internet Explorer 8 &amp; 9</h4>

                    <p>Bootstrap exclusively uses CSS3 for its animations, but Internet Explorer 8 &amp; 9 don't support
                        the necessary CSS properties. Thus, there are no slide transition animations when using these
                        browsers. We have intentionally decided not to include jQuery-based fallbacks for the
                        transitions.</p>
                </div>

                <h3>Optional captions</h3>

                <p>Add captions to your slides easily with the <code>.carousel-caption</code> element within any <code>.item</code>.
                    Place just about any optional HTML within there and it will be automatically aligned and formatted.
                </p>

                <div class="bs-example">
                    <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-captions" data-slide-to="1" class="active"></li>
                            <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#777:#777" alt="900x500"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM3Nzc7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDJwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4="
                                     data-holder-rendered="true">

                                <div class="carousel-caption">
                                    <h3>First slide label</h3>

                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="item active">
                                <img data-src="holder.js/900x500/auto/#666:#666" alt="900x500"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM2NjY7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDJwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj45MDB4NTAwPC90ZXh0PjwvZz48L3N2Zz4="
                                     data-holder-rendered="true">

                                <div class="carousel-caption">
                                    <h3>Second slide label</h3>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="item">
                                <img data-src="holder.js/900x500/auto/#555:#5555" alt="900x500"
                                     src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSIvPjxnPjx0ZXh0IHg9IjM0MC45OTIxODc1IiB5PSIyNTAiIHN0eWxlPSJmaWxsOiM1NTU1O2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjQycHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+OTAweDUwMDwvdGV4dD48L2c+PC9zdmc+"
                                     data-holder-rendered="true">

                                <div class="carousel-caption">
                                    <h3>Third slide label</h3>

                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control"
                           href="#carousel-example-captions" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control"
                           href="#carousel-example-captions" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- /example -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span
                                class="na">class=</span><span class="s">"item"</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;img</span> <span class="na">src=</span><span class="s">"..."</span>
                            <span class="na">alt=</span><span class="s">"..."</span><span class="nt">&gt;</span>
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"carousel-caption"</span><span
                                class="nt">&gt;</span>
                            <span class="nt">&lt;h3&gt;</span>...<span class="nt">&lt;/h3&gt;</span>
                            <span class="nt">&lt;p&gt;</span>...<span class="nt">&lt;/p&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <div class="bs-callout bs-callout-danger">
                    <h4>Accessibility issue</h4>

                    <p>The carousel component is generally not compliant with accessibility standards. If you need to be
                        compliant, please consider other options for presenting your content.</p>
                </div>

                <h2 id="carousel-usage">Usage</h2>

                <h3>Multiple carousels</h3>

                <p>Carousels require the use of an <code>id</code> on the outermost container (the
                    <code>.carousel</code>) for carousel controls to function properly. When adding multiple carousels,
                    or when changing a carousel's <code>id</code>, be sure to update the relevant controls.</p>

                <h3>Via data attributes</h3>

                <p>Use data attributes to easily control the position of the carousel. <code>data-slide</code> accepts
                    the keywords <code>prev</code> or <code>next</code>, which alters the slide position relative to its
                    current position. Alternatively, use <code>data-slide-to</code> to pass a raw slide index to the
                    carousel <code>data-slide-to="2"</code>, which shifts the slide position to a particular index
                    beginning with <code>0</code>.</p>

                <p>The <code>data-ride="carousel"</code> attribute is used to mark a carousel as animating starting at
                    page load. <strong class="text-danger">It cannot be used in combination with (redundant and
                        unnecessary) explicit JavaScript initialization of the same carousel.</strong></p>

                <h3>Via JavaScript</h3>

                <p>Call carousel manually with:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'.carousel'</span><span class="p">).</span><span
                                class="nx">carousel</span><span class="p">()</span>
                        </code></pre>
                </div>

                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-interval=""</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 50px;">type</th>
                            <th style="width: 50px;">default</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>interval</td>
                            <td>number</td>
                            <td>5000</td>
                            <td>The amount of time to delay between automatically cycling an item. If false, carousel
                                will not automatically cycle.
                            </td>
                        </tr>
                        <tr>
                            <td>pause</td>
                            <td>string</td>
                            <td>"hover"</td>
                            <td>Pauses the cycling of the carousel on mouseenter and resumes the cycling of the carousel
                                on mouseleave.
                            </td>
                        </tr>
                        <tr>
                            <td>wrap</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>Whether the carousel should cycle continuously or have hard stops.</td>
                        </tr>
                        <tr>
                            <td>keyboard</td>
                            <td>boolean</td>
                            <td>true</td>
                            <td>Whether the carousel should react to keyboard events.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

                <h3>Methods</h3>

                <h4>.carousel(options)</h4>

                <p>Initializes the carousel with an optional options <code>object</code> and starts cycling through
                    items.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'.carousel'</span><span class="p">).</span><span
                                class="nx">carousel</span><span class="p">({</span>
                            <span class="nx">interval</span><span class="o">:</span> <span class="mi">2000</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>

                <h4>.carousel('cycle')</h4>

                <p>Cycles through the carousel items from left to right.</p>

                <h4>.carousel('pause')</h4>

                <p>Stops the carousel from cycling through items.</p>


                <h4>.carousel(number)</h4>

                <p>Cycles the carousel to a particular frame (0 based, similar to an array).</p>

                <h4>.carousel('prev')</h4>

                <p>Cycles to the previous item.</p>

                <h4>.carousel('next')</h4>

                <p>Cycles to the next item.</p>

                <h3>Events</h3>

                <p>Bootstrap's carousel class exposes two events for hooking into carousel functionality.</p>

                <p>Both events have the following additional properties:</p>
                <ul>
                    <li><code>direction</code>: The direction in which the carousel is sliding (either
                        <code>"left"</code> or <code>"right"</code>).
                    </li>
                    <li><code>relatedTarget</code>: The DOM element that is being slid into place as the active item.
                    </li>
                </ul>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>slide.bs.carousel</td>
                            <td>This event fires immediately when the <code>slide</code> instance method is invoked.
                            </td>
                        </tr>
                        <tr>
                            <td>slid.bs.carousel</td>
                            <td>This event is fired when the carousel has completed its slide transition.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myCarousel'</span><span class="p">).</span><span class="nx">on</span><span
                                class="p">(</span><span class="s1">'slide.bs.carousel'</span><span class="p">,</span>
                            <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span>
                            <span class="c1">// do something…</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>
            </div>

            <div class="bs-docs-section">
                <h1 id="affix" class="page-header">Affix
                    <small>affix.js</small>
                </h1>

                <h2 id="affix-examples">Example</h2>

                <p>The subnavigation on the right is a live demo of the affix plugin.</p>

                <hr class="bs-docs-separator">

                <h2 id="affix-usage">Usage</h2>

                <p>Use the affix plugin via data attributes or manually with your own JavaScript. <strong
                        class="text-danger">In both situations, you must provide CSS for the positioning and width of
                        your affixed content.</strong></p>

                <h3>Positioning via CSS</h3>

                <p>The affix plugin toggles between three classes, each representing a particular state:
                    <code>.affix</code>, <code>.affix-top</code>, and <code>.affix-bottom</code>. You must provide the
                    styles for these classes yourself (independent of this plugin) to handle the actual positions.</p>

                <p>Here's how the affix plugin works:</p>
                <ol>
                    <li>To start, the plugin adds <code>.affix-top</code> to indicate the element is in its top-most
                        position. At this point no CSS positioning is required.
                    </li>
                    <li>Scrolling past the element you want affixed should trigger the actual affixing. This is where
                        <code>.affix</code> replaces <code>.affix-top</code> and sets <code>position: fixed;</code>
                        (provided by Bootstrap's CSS).
                    </li>
                    <li>If a bottom offset is defined, scrolling past it should replace <code>.affix</code> with <code>.affix-bottom</code>.
                        Since offsets are optional, setting one requires you to set the appropriate CSS. In this case,
                        add <code>position: absolute;</code> when necessary. The plugin uses the data attribute or
                        JavaScript option to determine where to position the element from there.
                    </li>
                </ol>
                <p>Follow the above steps to set your CSS for either of the usage options below.</p>

                <h3>Via data attributes</h3>

                <p>To easily add affix behavior to any element, just add <code>data-spy="affix"</code> to the element
                    you want to spy on. Use offsets to define when to toggle the pinning of an element.</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="html"><span class="nt">&lt;div</span> <span class="na">data-spy=</span><span
                                class="s">"affix"</span> <span class="na">data-offset-top=</span><span
                                class="s">"60"</span> <span class="na">data-offset-bottom=</span><span
                                class="s">"200"</span><span class="nt">&gt;</span>
                            ...
                            <span class="nt">&lt;/div&gt;</span>
                        </code></pre>
                </div>

                <h3>Via JavaScript</h3>

                <p>Call the affix plugin via JavaScript:</p>

                <div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>
                <div class="highlight"><pre><code class="js"><span class="nx">$</span><span class="p">(</span><span
                                class="s1">'#myAffix'</span><span class="p">).</span><span class="nx">affix</span><span
                                class="p">({</span>
                            <span class="nx">offset</span><span class="o">:</span> <span class="p">{</span>
                            <span class="nx">top</span><span class="o">:</span> <span class="mi">100</span><span
                                class="p">,</span>
                            <span class="nx">bottom</span><span class="o">:</span> <span class="kd">function</span>
                            <span class="p">()</span> <span class="p">{</span>
                            <span class="k">return</span> <span class="p">(</span><span class="k">this</span><span
                                class="p">.</span><span class="nx">bottom</span> <span class="o">=</span> <span
                                class="nx">$</span><span class="p">(</span><span class="s1">'.footer'</span><span
                                class="p">).</span><span class="nx">outerHeight</span><span class="p">(</span><span
                                class="kc">true</span><span class="p">))</span>
                            <span class="p">}</span>
                            <span class="p">}</span>
                            <span class="p">})</span>
                        </code></pre>
                </div>


                <h3>Options</h3>

                <p>Options can be passed via data attributes or JavaScript. For data attributes, append the option name
                    to <code>data-</code>, as in <code>data-offset-top="200"</code>.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 100px;">Name</th>
                            <th style="width: 100px;">type</th>
                            <th style="width: 50px;">default</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>offset</td>
                            <td>number | function | object</td>
                            <td>10</td>
                            <td>Pixels to offset from screen when calculating position of scroll. If a single number is
                                provided, the offset will be applied in both top and bottom directions. To provide a
                                unique, bottom and top offset just provide an object <code>offset: { top: 10 }</code> or
                                <code>offset: { top: 10, bottom: 5 }</code>. Use a function when you need to dynamically
                                calculate an offset.
                            </td>
                        </tr>
                        <tr>
                            <td>target</td>
                            <td>selector | node | jQuery element</td>
                            <td>the <code>window</code> object</td>
                            <td>Specifies the target element of the affix.</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->


                <h3>Events</h3>

                <p>Bootstrap's affix plugin exposes a few events for hooking into affix functionality.</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 150px;">Event Type</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>affix.bs.affix</td>
                            <td>This event fires immediately before the element has been affixed.</td>
                        </tr>
                        <tr>
                            <td>affixed.bs.affix</td>
                            <td>This event is fired after the element has been affixed.</td>
                        </tr>
                        <tr>
                            <td>affix-top.bs.affix</td>
                            <td>This event fires immediately before the element has been affixed-top.</td>
                        </tr>
                        <tr>
                            <td>affixed-top.bs.affix</td>
                            <td>This event is fired after the element has been affixed-top.</td>
                        </tr>
                        <tr>
                            <td>affix-bottom.bs.affix</td>
                            <td>This event fires immediately before the element has been affixed-bottom.</td>
                        </tr>
                        <tr>
                            <td>affixed-bottom.bs.affix</td>
                            <td>This event is fired after the element has been affixed-bottom.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>


        </div>
        <div class="col-md-3">
            <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top" role="complementary">
                <ul class="nav bs-docs-sidenav">

                    <li>
                        <a href="#js-overview">概览</a>
                        <ul class="nav">
                            <li><a href="#js-individual-compiled">单个还是全部引入</a></li>
                            <li><a href="#js-data-attrs">data 属性</a></li>
                            <li><a href="#js-programmatic-api">编程方式的 API</a></li>
                            <li><a href="#js-noconflict">避免命名空间冲突</a></li>
                            <li><a href="#js-events">事件</a></li>
                            <li><a href="#js-disabled">浏览器的 JavaScript 被禁用的情况</a></li>
                            <li><a href="#callout-third-party-libs">第三方工具库</a></li>
                        </ul>
                    </li>
                    <li><a href="#transitions">过渡效果</a></li>
                    <li>
                        <a href="#modals">模态框</a>
                        <ul class="nav">
                            <li><a href="#modals-examples">实例</a></li>
                            <li><a href="#modals-sizes">Sizes</a></li>
                            <li><a href="#modals-remove-animation">Remove animation</a>
                            </li>
                            <li><a href="#modals-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#dropdowns">下拉菜单</a>
                        <ul class="nav">
                            <li><a href="#dropdowns-examples">实例</a></li>
                            <li><a href="#dropdowns-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#scrollspy">滚动监听</a>
                        <ul class="nav">
                            <li><a href="#scrollspy-examples">实例</a></li>
                            <li><a href="#scrollspy-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#tabs">标签页</a>
                        <ul class="nav">
                            <li><a href="#tabs-examples">实例</a></li>
                            <li><a href="#tabs-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#tooltips">工具提示</a>
                        <ul class="nav">
                            <li><a href="#tooltips-examples">实例</a></li>
                            <li><a href="#tooltips-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#popovers">弹出框</a>
                        <ul class="nav">
                            <li><a href="#popovers-examples">实例</a></li>
                            <li><a href="#popovers-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#alerts">警告框</a>
                        <ul class="nav">
                            <li><a href="#alerts-examples">警告框实例</a></li>
                            <li><a href="#alerts-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#buttons">按钮</a>
                        <ul class="nav">
                            <li><a href="#buttons-stateful">Stateful</a></li>
                            <li><a href="#buttons-single-toggle">Single toggle</a></li>
                            <li><a href="#buttons-checkbox-radio">Checkbox / Radio</a>
                            </li>
                            <li><a href="#buttons-methods">方法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#collapse">Collapse</a>
                        <ul class="nav">
                            <li><a href="#collapse-examples">实例</a></li>
                            <li><a href="#collapse-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#carousel">Carousel</a>
                        <ul class="nav">
                            <li><a href="#carousel-examples">实例</a></li>
                            <li><a href="#carousel-usage">用法</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#affix">Affix</a>
                        <ul class="nav">
                            <li><a href="#affix-examples">实例</a></li>
                            <li><a href="#affix-usage">用法</a></li>
                        </ul>
                    </li>


                </ul>
                <a class="back-to-top" href="#top">
                    返回顶部
                </a>

                <a href="#" class="bs-docs-theme-toggle" role="button">Disable theme
                    preview</a>

            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>
</body></html>
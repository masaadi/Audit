<!DOCTYPE html>
<html lang='en' class=''>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BSCIC | Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../../vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../../vendors/base/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../../../css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../../images/bsic.png" />
    
            
        <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
        <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
        <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
        <meta charset='UTF-8'><meta name="robots" content="noindex">
        
        <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
        <link rel="canonical" href="https://codepen.io/alexkrolick/pen/xgyOXQ?depth=everything&order=popularity&page=6&q=react&show_forks=false" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel='stylesheet prefetch' href='https://unpkg.com/react-quill@1.0.0/dist/quill.core.css'>
        <link rel='stylesheet prefetch' href='https://unpkg.com/react-quill@1.0.0/dist/quill.snow.css'>
        <link rel='stylesheet prefetch' href='https://unpkg.com/react-quill@1.0.0/dist/quill.bubble.css'>
        <style class="cp-pen-styles">
            .title-img{
                background-image: url('../../../images/handcraft.jpg');
                background-size: cover;
            }
        body {
        background: #f3f1f2;
        }

        

        .navbar{
            margin-bottom: 0px!important;
        }

        .app .ql-container {
        border-bottom-left-radius: 0.5em;
        border-bottom-right-radius: 0.5em;
        background: #fefcfc;
        }

        /* Snow Theme */
        .app .ql-snow.ql-toolbar {
        display: block;
        background: #eaecec;
        border-top-left-radius: 0.5em;
        border-top-right-radius: 0.5em;
        }

        /* Bubble Theme */
        .app .ql-bubble .ql-editor {
        border: 1px solid #ccc;
        border-radius: 0.5em;
        }

        .app .ql-editor {
        min-height: 18em;
        }

        .themeSwitcher {
        margin-top: 0.5em;
        font-size: small;
        }</style>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top"  style="background-color: brown;">
                <div class="container">
                  <a class="navbar-brand" href="#">BSCIC</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                      <ul class="navbar-nav ml-auto">
                          <li class="nav-item active">
                            <a class="nav-link" href="blog.php">BLOG
                              <span class="sr-only">(current)</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../../../../index.php">BACK TO HOME</a>
                          </li>
                        </ul>
                  </div>
                </div>
              </nav>
            
              <div class="card title-img">
                  <div class="card-body">
                    <div class="container">
                      <img src="../../../images/bsic.png" alt="" style="width: 150px;" class="p-3">
                    </div>
                  </div>
                </div>
            
              <!-- Page Content -->
              <div class="container">
            
                <div class="row">
            
                  <!-- Post Content Column -->
                  <div class="col-lg-8">
                                        <form action="" method="" class="mt-3">
                                                <div class="form-group">
                                                    <label>Post Title</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                        <div class="app">
                                                            </div>
                                                </div>
                                                <div class="form-group">
                                                        <label>Post Image</label>
                                                    <input type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="POST" class="btn btn-primary btn-block">
                                                </div>
                                            </form>
            
                  </div>
            
                  <!-- Sidebar Widgets Column -->
                  <div class="col-md-4">
            
                    <!-- Search Widget -->
                    <div class="card my-4">
                      <h5 class="card-header">Search</h5>
                      <div class="card-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
            
                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Recent Blogs</h5>
                        <div class="card-body">
                            <div class="card mb-4">
                                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                                <div class="card-body">
                                  <h2 class="card-title">Post Title</h2>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid </p>
                                  <a href="#" class="btn btn-primary">Read More &rarr;</a>
                                </div>
                                <div class="card-footer text-muted">
                                  Posted on January 1, 2017 by
                                  <a href="#">Start Bootstrap</a>
                                </div>
                              </div>
                              <div class="card mb-4">
                                  <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                                  <div class="card-body">
                                    <h2 class="card-title">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque,</p>
                                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    Posted on January 1, 2017 by
                                    <a href="#">Start Bootstrap</a>
                                  </div>
                                </div>
                        </div>
                      </div>
            
                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Popular Blogs</h5>
                        <div class="card-body">
                            <div class="card mb-4">
                                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                                <div class="card-body">
                                  <h2 class="card-title">Post Title</h2>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                  <a href="#" class="btn btn-primary">Read More &rarr;</a>
                                </div>
                                <div class="card-footer text-muted">
                                  Posted on January 1, 2017 by
                                  <a href="#">Start Bootstrap</a>
                                </div>
                              </div>
                              <div class="card mb-4">
                                  <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                                  <div class="card-body">
                                    <h2 class="card-title">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                                  </div>
                                  <div class="card-footer text-muted">
                                    Posted on January 1, 2017 by
                                    <a href="#">Start Bootstrap</a>
                                  </div>
                                </div>
                        </div>
                      </div>
            
                  </div>
            
                </div>
                <!-- /.row -->
            
              </div>
              <!-- /.container -->
            
              <!-- Footer -->
              <footer class="py-5 bg-dark">
                <div class="container">
                  <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
                </div>
                <!-- /.container -->
              </footer>
            
              <!-- Bootstrap core JavaScript -->
              <script src="vendor/jquery/jquery.min.js"></script>
              <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.js'></script><script src='https://unpkg.com/prop-types/prop-types.js'></script><script src='https://unpkg.com/react-quill@latest/dist/react-quill.js'></script>
<script >'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

/* 
 * Simple editor component that takes placeholder text as a prop 
 */

var Editor = function (_React$Component) {
  _inherits(Editor, _React$Component);

  function Editor(props) {
    _classCallCheck(this, Editor);

    var _this = _possibleConstructorReturn(this, _React$Component.call(this, props));

    _this.state = { editorHtml: '', theme: 'snow' };
    _this.handleChange = _this.handleChange.bind(_this);
    return _this;
  }

  Editor.prototype.handleChange = function handleChange(html) {
    this.setState({ editorHtml: html });
  };

  Editor.prototype.handleThemeChange = function handleThemeChange(newTheme) {
    if (newTheme === "core") newTheme = null;
    this.setState({ theme: newTheme });
  };

  Editor.prototype.render = function render() {
    var _this2 = this;

    return React.createElement(
      'div',
      null,
      React.createElement(ReactQuill, {
        theme: this.state.theme,
        onChange: this.handleChange,
        value: this.state.editorHtml,
        modules: Editor.modules,
        formats: Editor.formats,
        bounds: '.app',
        placeholder: this.props.placeholder
      }),
      React.createElement(
        'div',
        { className: 'themeSwitcher' },
        React.createElement(
          'label',
          null,
          'Theme '
        ),
        React.createElement(
          'select',
          { onChange: function onChange(e) {
              return _this2.handleThemeChange(e.target.value);
            } },
          React.createElement(
            'option',
            { value: 'snow' },
            'Snow'
          ),
          React.createElement(
            'option',
            { value: 'bubble' },
            'Bubble'
          ),
          React.createElement(
            'option',
            { value: 'core' },
            'Core'
          )
        )
      )
    );
  };

  return Editor;
}(React.Component);

/* 
 * Quill modules to attach to editor
 * See https://quilljs.com/docs/modules/ for complete options
 */

Editor.modules = {
  toolbar: [[{ 'header': '1' }, { 'header': '2' }, { 'font': [] }], [{ size: [] }], ['bold', 'italic', 'underline', 'strike', 'blockquote'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['link', 'image', 'video'], ['clean']],
  clipboard: {
    // toggle to add extra line breaks when pasting HTML:
    matchVisual: false
  }
};
/* 
 * Quill editor formats
 * See https://quilljs.com/docs/formats/
 */
Editor.formats = ['header', 'font', 'size', 'bold', 'italic', 'underline', 'strike', 'blockquote', 'list', 'bullet', 'indent', 'link', 'image', 'video'];

/* 
 * PropType validation
 */
Editor.propTypes = {
  placeholder: React.PropTypes.string
};

/* 
 * Render component on page
 */
ReactDOM.render(React.createElement(Editor, { placeholder: 'Write something...' }), document.querySelector('.app'));
//# sourceURL=pen.js
</script>
</body>
</html>
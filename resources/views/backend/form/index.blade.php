@extends('backend.layouts.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Forms</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Elements</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="email2">Email Address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email2"
                                            placeholder="Enter Email"
                                        />
                                        <small id="emailHelp2" class="form-text text-muted"
                                        >We'll never share your email with anyone
                                            else.</small
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <div class="form-group form-inline">
                                        <label
                                            for="inlineinput"
                                            class="col-md-3 col-form-label"
                                        >Inline Input</label
                                        >
                                        <div class="col-md-9 p-0">
                                            <input
                                                type="text"
                                                class="form-control input-full"
                                                id="inlineinput"
                                                placeholder="Enter Input"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="successInput">Success Input</label>
                                        <input
                                            type="text"
                                            id="successInput"
                                            value="Success"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group has-error has-feedback">
                                        <label for="errorInput">Error Input</label>
                                        <input
                                            type="text"
                                            id="errorInput"
                                            value="Error"
                                            class="form-control"
                                        />
                                        <small id="emailHelp" class="form-text text-muted"
                                        >Please provide a valid informations.</small
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="disableinput">Disable Input</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="disableinput"
                                            placeholder="Enter Input"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label><br/>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="flexRadioDefault"
                                                    id="flexRadioDefault1"
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="flexRadioDefault1"
                                                >
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="flexRadioDefault"
                                                    id="flexRadioDefault2"
                                                    checked
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="flexRadioDefault2"
                                                >
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Static </label>
                                        <p class="form-control-static">hello@example.com</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"
                                        >Example select</label
                                        >
                                        <select
                                            class="form-select"
                                            id="exampleFormControlSelect1"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2"
                                        >Example multiple select</label
                                        >
                                        <select
                                            multiple
                                            class="form-control"
                                            id="exampleFormControlSelect2"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1"
                                        >Example file input</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control-file"
                                            id="exampleFormControlFile1"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea class="form-control" id="comment" rows="5">
                          </textarea>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            value=""
                                            id="flexCheckDefault"
                                        />
                                        <label
                                            class="form-check-label"
                                            for="flexCheckDefault"
                                        >
                                            Agree with terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"
                            >@</span
                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Username"
                                                aria-label="Username"
                                                aria-describedby="basic-addon1"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Recipient's username"
                                                aria-label="Recipient's username"
                                                aria-describedby="basic-addon2"
                                            />
                                            <span class="input-group-text" id="basic-addon2"
                                            >@example.com</span
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="basic-url">Your vanity URL</label>
                                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3"
                            >https://example.com/users/</span
                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="basic-url"
                                                aria-describedby="basic-addon3"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                aria-label="Amount (to the nearest dollar)"
                                            />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">With textarea</span>
                                            <textarea
                                                class="form-control"
                                                aria-label="With textarea"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button
                                                class="btn btn-black btn-border"
                                                type="button"
                                            >
                                                Button
                                            </button>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder=""
                                                aria-label=""
                                                aria-describedby="basic-addon1"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                aria-label="Text input with dropdown button"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    class="btn btn-primary btn-border dropdown-toggle"
                                                    type="button"
                                                    data-bs-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                >
                                                    Dropdown
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#"
                                                    >Another action</a
                                                    >
                                                    <a class="dropdown-item" href="#"
                                                    >Something else here</a
                                                    >
                                                    <div
                                                        role="separator"
                                                        class="dropdown-divider"
                                                    ></div>
                                                    <a class="dropdown-item" href="#"
                                                    >Separated link</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Search for..."
                                            />
                                            <span class="input-icon-addon">
                              <i class="fa fa-search"></i>
                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-user"></i>
                            </span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Username"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image Check</label>
                                        <div class="row">
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input
                                                        name="imagecheck"
                                                        type="checkbox"
                                                        value="1"
                                                        class="imagecheck-input"
                                                    />
                                                    <figure class="imagecheck-figure">
                                                        <img
                                                            src="../assets/img/examples/product1.jpg"
                                                            alt="title"
                                                            class="imagecheck-image"
                                                        />
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input
                                                        name="imagecheck"
                                                        type="checkbox"
                                                        value="2"
                                                        class="imagecheck-input"
                                                        checked=""
                                                    />
                                                    <figure class="imagecheck-figure">
                                                        <img
                                                            src="../assets/img/examples/product4.jpg"
                                                            alt="title"
                                                            class="imagecheck-image"
                                                        />
                                                    </figure>
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="imagecheck mb-4">
                                                    <input
                                                        name="imagecheck"
                                                        type="checkbox"
                                                        value="3"
                                                        class="imagecheck-input"
                                                    />
                                                    <figure class="imagecheck-figure">
                                                        <img
                                                            src="../assets/img/examples/product3.jpg"
                                                            alt="title"
                                                            class="imagecheck-image"
                                                        />
                                                    </figure>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Color Input</label>
                                        <div class="row gutters-xs">
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="dark"
                                                        class="colorinput-input"
                                                    />
                                                    <span class="colorinput-color bg-black"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="primary"
                                                        class="colorinput-input"
                                                    />
                                                    <span
                                                        class="colorinput-color bg-primary"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="secondary"
                                                        class="colorinput-input"
                                                    />
                                                    <span
                                                        class="colorinput-color bg-secondary"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="info"
                                                        class="colorinput-input"
                                                    />
                                                    <span class="colorinput-color bg-info"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="success"
                                                        class="colorinput-input"
                                                    />
                                                    <span
                                                        class="colorinput-color bg-success"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="danger"
                                                        class="colorinput-input"
                                                    />
                                                    <span class="colorinput-color bg-danger"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input
                                                        name="color"
                                                        type="checkbox"
                                                        value="warning"
                                                        class="colorinput-input"
                                                    />
                                                    <span
                                                        class="colorinput-color bg-warning"
                                                    ></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Size</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="value"
                                                    value="50"
                                                    class="selectgroup-input"
                                                    checked=""
                                                />
                                                <span class="selectgroup-button">S</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="value"
                                                    value="100"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">M</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="value"
                                                    value="150"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">L</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="value"
                                                    value="200"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">XL</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Icons input</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="transportation"
                                                    value="2"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="icon-screen-smartphone"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="transportation"
                                                    value="1"
                                                    class="selectgroup-input"
                                                    checked=""
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="icon-screen-tablet"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="transportation"
                                                    value="6"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="icon-screen-desktop"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="transportation"
                                                    value="6"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="fa fa-times"></i
                                                    ></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label d-block">Icon input</label>
                                        <div
                                            class="selectgroup selectgroup-secondary selectgroup-pills"
                                        >
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="icon-input"
                                                    value="1"
                                                    class="selectgroup-input"
                                                    checked=""
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="fa fa-sun"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="icon-input"
                                                    value="2"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="fa fa-moon"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="icon-input"
                                                    value="3"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="fa fa-tint"></i
                                                    ></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="radio"
                                                    name="icon-input"
                                                    value="4"
                                                    class="selectgroup-input"
                                                />
                                                <span
                                                    class="selectgroup-button selectgroup-button-icon"
                                                ><i class="fa fa-cloud"></i
                                                    ></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Your skills</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="HTML"
                                                    class="selectgroup-input"
                                                    checked=""
                                                />
                                                <span class="selectgroup-button">HTML</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="CSS"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">CSS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="PHP"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">PHP</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="JavaScript"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">JavaScript</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="Ruby"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">Ruby</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="Ruby"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">Ruby</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input
                                                    type="checkbox"
                                                    name="value"
                                                    value="C++"
                                                    class="selectgroup-input"
                                                />
                                                <span class="selectgroup-button">C++</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <label class="mb-3"><b>Form Group Default</b></label>
                                    <div class="form-group form-group-default">
                                        <label>Input</label>
                                        <input
                                            id="Name"
                                            type="text"
                                            class="form-control"
                                            placeholder="Fill Name"
                                        />
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Select</label>
                                        <select
                                            class="form-select"
                                            id="formGroupDefaultSelect"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <label class="mt-3 mb-3"
                                    ><b>Form Floating Label</b></label
                                    >
                                    <div class="form-floating form-floating-custom mb-3">
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="name@example.com"
                                        />
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating form-floating-custom mb-3">
                                        <select
                                            class="form-select"
                                            id="selectFloatingLabel"
                                            required
                                        >
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <label for="selectFloatingLabel">Select</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="largeInput">Large Input</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-lg"
                                            id="largeInput"
                                            placeholder="Large Input"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="largeInput">Default Input</label>
                                        <input
                                            type="text"
                                            class="form-control form-control"
                                            id="defaultInput"
                                            placeholder="Default Input"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="smallInput">Small Input</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            id="smallInput"
                                            placeholder="Small Input"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="largeSelect">Large Select</label>
                                        <select
                                            class="form-select form-control-lg"
                                            id="largeSelect"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">Default Select</label>
                                        <select
                                            class="form-select form-control"
                                            id="defaultSelect"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="smallSelect">Small Select</label>
                                        <select
                                            class="form-select form-control-sm"
                                            id="smallSelect"
                                        >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Submit</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

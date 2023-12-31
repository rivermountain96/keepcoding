<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
  integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
  crossorigin="anonymous" referrerpolicy="no-referrer">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
  integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!-- summernote 시작--> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <!-- summernote 끝 -->
  <link rel="stylesheet" href="common.css">
  <style>
    .content > div{
      margin: 30px 0;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- summernote 시작-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <!-- summernote 끝 -->
  <title>common CSS</title>
</head>
<body class="content">
  <h1>common css</h1>
  <hr>
  <h2>keep coding</h2>
  <hr>
  <p>content > div 들에 있는 id는 요소별 div 그룹의 구분 용이함을 위해 임의로 삽입하였습니다.</p>
  <hr>
  <div id="typo">
    <h3>typo</h3>
    <hr>
    <h4>font</h4>
    <hr>
    <h5>pretendard</h5>
    <hr>
    <h6>body, font weight</h6>
    <p>class명 확인하여 font weight 변경</p>
    <hr>
    <p class="fw-bold">Bold text.</p>
    <p class="fw-bolder">Bolder weight text (relative to the parent element).</p>
    <p class="fw-semibold">Semibold weight text.</p>
    <p class="fw-medium">Medium weight text.</p>
    <p class="fw-normal">Normal weight text.</p>
    <p class="fw-light">Light weight text.</p>
    <p class="fw-lighter">Lighter weight text (relative to the parent element).</p>
    <p class="fst-italic">Italic text.</p>
    <p class="fst-normal">Text with normal font style</p>
    <hr>
    <h6>heading</h6>
    <p>bootstrap에 따라 태그 사용시 자동 적용</p>
    <hr>
    <h1>h1 title</h1>
    <h2>h2 title</h2>
    <h3>h3 title</h3>
    <h4>h4 title</h4>
    <h5>h5 title</h5>
    <h6>h6 title</h6>
    <hr>
    <h6>font size</h6>
    <p>class명 확인하여 font size 변경</p>
    <hr>
    <p class="fs-1">font size 1</p>
    <p class="fs-2">font size 2</p>
    <p class="fs-3">font size 3</p>
    <p class="fs-4">font size 4</p>
    <p class="fs-5">font size 5</p>
    <p class="fs-6">font size 6</p>
    <hr>
    <h6>text transform</h6>
    <p>class명 확인하여 변경</p>
    <hr>
    <p class="text-lowercase">Lowercased text.</p>
    <p class="text-uppercase">Uppercased text.</p>
    <p class="text-capitalize">CapiTaliZed text.</p>
    <hr>
    <h6>lead text</h6>
    <p>class명 확인하여 변경</p>
    <hr>
    <p class="lead">
      This is a lead paragraph. It stands out from regular paragraphs.
    </p>
    <hr>
    <h6>text align</h6>
    <p>class명 확인하여 변경</p>
    <hr>
    <p class="text-start">Start aligned text on all viewport sizes.</p>
    <p class="text-center">Center aligned text on all viewport sizes.</p>
    <p class="text-end">End aligned text on all viewport sizes.</p>

    <p class="text-sm-end">End aligned text on viewports sized SM (small) or wider.</p>
    <p class="text-md-end">End aligned text on viewports sized MD (medium) or wider.</p>
    <p class="text-lg-end">End aligned text on viewports sized LG (large) or wider.</p>
    <p class="text-xl-end">End aligned text on viewports sized XL (extra large) or wider.</p>
    <p class="text-xxl-end">End aligned text on viewports sized XXL (extra extra large) or wider.</p>
  </div>
  <hr>
  <div id="color">
    <h3>color</h3>
    <p>class명 확인하여 변경</p>
    <hr>
    <div class="pc">primary color</div>
    <div class="pcbg">primary color</div>
    <div class="mc-black">mono color black</div>
    <div class="mcbg-black">mono color black</div>
    <div class="mc-gray1">mono color gray1</div>
    <div class="mcbg-gray1">mono color gray1</div>
    <div class="mc-gray2 pcbg">mono color gray2</div>
    <div class="mcbg-gray2">mono color gray2</div>
    <div class="mc-gray3">mono color gray3</div>
    <div class="mcbg-gray3">mono color gray3</div>
    <div class="mc-white pcbg">mono color gray3</div>
    <div class="mcbg-white">mono color gray3</div>
  </div>
  <hr>
  <div id="shadow">
    <h3>shadow</h3>
    <p>class명 확인하여 변경</p>
    <hr>
    <div class="shadow-none p-3 mb-5 bg-body-tertiary rounded">No shadow</div>
    <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">Small shadow</div>
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded">Regular shadow</div>
    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">Larger shadow</div>
  </div>
  <hr>
  <div id="components">
    <h3>components</h3>
    <hr>
    <div id="alert">
      <h4>alert</h4>
      <p>class명 확인하여 변경</p>
      <div class="alert alert-secondary" role="alert">
        A simple secondary alert—check it out!
      </div>
    </div>
    <hr>
    <div id="buttons">
      <h4>buttons</h4>
      <p>class명 확인하여 변경</p>
      <hr>
      <button type="button" class="btn btn-outline-primary">defaylt button</button>
      <button type="button" class="btn btn-outline-primary btn-lg">Large button</button>
      <button type="button" class="btn btn-outline-primary btn-sm">small button</button>
    </div>
    <hr>
    <div id="button group">
      <h4>button group</h4>
      <p>class명 확인하여 변경</p>
      <hr>
      <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
        <button type="button" class="btn btn-outline-primary">Left</button>
        <button type="button" class="btn btn-outline-primary">Middle</button>
        <button type="button" class="btn btn-outline-primary">Right</button>
      </div>
      <br>
      <div class="btn-group" role="group" aria-label="Default button group">
        <button type="button" class="btn btn-outline-primary">Left</button>
        <button type="button" class="btn btn-outline-primary">Middle</button>
        <button type="button" class="btn btn-outline-primary">Right</button>
      </div>
      <br>
      <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
        <button type="button" class="btn btn-outline-primary">Left</button>
        <button type="button" class="btn btn-outline-primary">Middle</button>
        <button type="button" class="btn btn-outline-primary">Right</button>
      </div>
    </div>
    <hr>
  </div>
  <hr>
  <div id="form">
    <p>class명 확인하여 변경</p>
    <h3>form</h3>
    <hr>
    <h4>input</h4>
    <hr>
    <div id="email_input">
      <h5>Email input</h5>
      <hr>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control focus-ring" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
    </div>
    <hr>
    <div id="textarea">
      <h5>textarea input</h5>
      <hr>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Summernote</label>
        <br>
        <div id="summernote"></div>
      </div>
    </div>
    <hr>
    <div id="input_sizing">
      <h5>input sizing</h5>
      <hr>
      <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
      <input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
      <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
    </div>
    <hr>
    <div id="form_text">
      <h5>form text</h5>
      <hr>
      <label for="inputPassword5" class="form-label">Password</label>
      <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
      <div id="passwordHelpBlock" class="form-text">
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
      </div>
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
          <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Must be 8-20 characters long.
          </span>
        </div>
      </div>
    </div>
    <hr>
    <div id="file_input">
      <h5>file input</h5>
      <hr>
      <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
      </div>
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
      </div>
      <div class="mb-3">
        <label for="formFileDisabled" class="form-label">Disabled file input example</label>
        <input class="form-control" type="file" id="formFileDisabled" disabled>
      </div>
      <div class="mb-3">
        <label for="formFileSm" class="form-label">Small file input example</label>
        <input class="form-control form-control-sm" id="formFileSm" type="file">
      </div>
      <div>
      <label for="formFileLg" class="form-label">Large file input example</label>
      <input class="form-control form-control-lg" id="formFileLg" type="file">
      </div>  
    </div>
    <hr>
    <div id="select_menu">
      <h5>select menu</h5>
      <hr>
      <select class="form-select form-select-lg mb-3" aria-label="Large select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <select class="form-select form-select-sm" aria-label="Small select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    <hr>
    <div id="dropdown">
      <h5>select menu</h5>
      <hr>
      <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown link
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div id="toggle_switches">
      <h4>toggle switches</h4>
      <hr>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
        <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
      </div>
    </div>
    <hr>
    <div id="radio">
      <h4>radio</h4>
      <hr>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
          Default radio
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
          Second default radio
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
        <label class="form-check-label" for="exampleRadios3">
          Disabled radio
        </label>
      </div>
    </div>
    <hr>
    <div id="radio">
      <h4>check box</h4>
      <hr>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Default checkbox
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
          Checked checkbox
        </label>
      </div>
    </div>
  </div>
  <hr>
  <div id="table">
    <h3>table</h3>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
  <hr>
  <div id="callout" class="d-flex">
    <h3>callout</h3>
    <hr>
    <div class="callout bd-callout d-flex justify-content-between">
      <span>판매 강좌 수</span>
      <span data-num="0">0건</span>
      <i class="bi bi-arrow-up-circle"></i>
    </div>
    <div class="callout bd-callout d-flex justify-content-between">
      <span>판매 강좌 수</span>
      <span data-num="0">0건</span>
      <i class="bi bi-arrow-up-circle"></i>
    </div>
    <div class="callout bd-callout d-flex justify-content-between">
      <span>판매 강좌 수</span>
      <span data-num="0">0건</span>
      <i class="bi bi-arrow-up-circle"></i>
    </div>
  </div>
  <hr>
  <div id="search">
    <h3>search</h3>
    <hr>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <hr>
    <h3>button added search</h3>
    <hr>
    <div class="input-group mb-3">
      <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
      <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>
  </div>
  <hr>
  <div id="calendar">
    <h3>datepicker</h3>
    <p>Date: <input type="text" id="datepicker" name="datepicker" class="form-control"></p>
  </div>
  <hr>
  <div id="pagenation">
    <h3>pagenation</h3>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>
  <hr>
  <div id="flex">
    <h3>flex</h3>
    <div class="flex-ex">
      <div class="d-flex justify-content-start gap-1">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex justify-content-end gap-2">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex justify-content-center gap-3">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex justify-content-between gap-4">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex justify-content-around gap-5">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex justify-content-evenly gap-6">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex align-items-start gap-7">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex align-items-end gap-8">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex align-items-center gap-9">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex align-items-baseline gap-10">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
      <div class="d-flex align-items-stretch gap-11">
        <div class="flex-box"></div>
        <div class="flex-box"></div>
        <div class="flex-box"></div>
      </div>
    </div>
  </div>
  <hr>
 
  <script>
    $("#datepicker").datepicker();

    $('#summernote').summernote({
      placeholder: 'Hello keep coding',
      tabsize: 2,
      height: 100
    });
  </script>
</body>
</html>
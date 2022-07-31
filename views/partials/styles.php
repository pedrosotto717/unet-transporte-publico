<link rel="stylesheet" href="./views/css/reset.css">
<link rel="stylesheet" href="./views/css/main.css">

<style>
  form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
  }

  select {
    width: 300px;
    max-height: 45px;
  }

  * {
    box-sizing: border-box;
  }

  svg {
    position: absolute;
    right: 12px;
    top: calc(50% - 3px);
    width: 10px;
    height: 6px;
    stroke-width: 2px;
    stroke: #9098a9;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
    pointer-events: none;
  }

  select {
    /* -webkit-appearance: none; */
    padding: 7px 40px 7px 12px;
    border: 1px solid #e8eaed;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 1px 2px -2px #222;
    cursor: pointer;
    font-family: inherit;
    font-size: 16px;
    transition: all 150ms ease;
  }

  select:required:invalid {
    color: #5a667f;
  }

  select option {
    color: #111;
  }

  select option[value=""][disabled] {
    display: none;
  }

  .sprites {
    position: absolute;
    width: 0;
    height: 0;
    pointer-events: none;
    user-select: none;
  }

  input {
    position: relative;
    z-index: 1;
    width: 300px;
    height: 35px;
    padding: 0 12px;
    border: 1px solid #e8eaed;
    outline: none;
    background: none;
    font-size: 16px;
    font-family: inherit;
    font-weight: inherit;
    font-style: inherit;
    transition: all 150ms ease;
    color: #222;
    margin: .5rem 0;
  }

  input:required:invalid {
    color: #5a667f;
  }

  input:focus {
    border-color: #e8eaed;
    box-shadow: 0 1px 2px -2px #222;
  }

  input:focus::-webkit-input-placeholder {
    color: #5a667f;
  }

  input:focus::-moz-placeholder {
    color: #5a667f;
  }

  input:focus:-ms-input-placeholder {
    color: #5a667f;
  }

  input:focus::-ms-input-placeholder {
    color: #5a667f;
  }

  input:focus::placeholder {
    color: #5a667f;
  }

  input:focus::-webkit-input-placeholder {
    color: #5a667f;
  }

  input:focus::-moz-placeholder {
    color: #5a667f;
  }

  input:focus:-ms-input-placeholder {
    color: #5a667f;
  }

  input:focus::-ms-input-placeholder {
    color: #5a667f;
  }

  input:focus::placeholder {
    color: #5a667f;
  }

  input:focus::-webkit-input-placeholder {
    color: #5a667f;
  }

  input:focus::-moz-placeholder {
    color: #5a667f;
  }

  input:-internal-autofill-selected {
    appearance: menulist-button !important;
    background-image: none !important;
    background-color: #000 !important;
    color: fieldtext !important;
  }

  input[type="submit"] {
    width: 300px;
    height: 35px;
    border: 1px solid #e8eaed;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 1px 2px -2px #222;
    cursor: pointer;
    font-size: 16px;
    transition: all 150ms ease;
    color: #fafafa;
    margin: 1rem 0;
    background-color: #222;
  }
</style>
/*
Copyright (c) 2021 by Sarah Higley (https://codepen.io/smhigley/pen/GRgjRVN)

Permission is hereby granted, free of charge, to any person obtaining a copy of this 
software and associated documentation files (the "Software"), to deal in the Software without 
restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, 
sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished 
to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial 
portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT 
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

// options for all examples
const options = $.parseJSON($.ajax({
                                    type: "GET",
                                    url: "<?php echo API; ?>item",
                                    dataType: "json", 
                                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                                    cache: false,
                                    async: false
                                  }).responseText);

/*
 * Helper constants and functions
 */

// make it easier for ourselves by putting some values in objects
// in TypeScript, these would be enums
const Keys = {
  Backspace: 'Backspace',
  Clear: 'Clear',
  Down: 'ArrowDown',
  End: 'End',
  Enter: 'Enter',
  Escape: 'Escape',
  Home: 'Home',
  Left: 'ArrowLeft',
  PageDown: 'PageDown',
  PageUp: 'PageUp',
  Right: 'ArrowRight',
  Space: ' ',
  Tab: 'Tab',
  Up: 'ArrowUp' };


const MenuActions = {
  Close: 0,
  CloseSelect: 1,
  First: 2,
  Last: 3,
  Next: 4,
  Open: 5,
  Previous: 6,
  Select: 7,
  Space: 8,
  Type: 9 };


// filter an array of options against an input string
// returns an array of options that begin with the filter string, case-independent
function filterOptions(options = [], filter, exclude = []) {
  return options.filter(option => {
    const matches = option.toLowerCase().indexOf(filter.toLowerCase()) === 0;
    return matches && exclude.indexOf(option) < 0;
  });
}

// return an array of exact option name matches from a comma-separated string
function findMatches(options, search) {
  const names = search.split(',');
  return names.map(name => {
    const match = options.filter(option => name.trim().toLowerCase() === option.toLowerCase());
    return match.length > 0 ? match[0] : null;
  }).
  filter(option => option !== null);
}

// return combobox action from key press
function getActionFromKey(key, menuOpen) {
  // handle opening when closed
  if (!menuOpen && key === Keys.Down) {
    return MenuActions.Open;
  }

  // handle keys when open
  if (key === Keys.Down) {
    return MenuActions.Next;
  } else
  if (key === Keys.Up) {
    return MenuActions.Previous;
  } else
  if (key === Keys.Home) {
    return MenuActions.First;
  } else
  if (key === Keys.End) {
    return MenuActions.Last;
  } else
  if (key === Keys.Escape) {
    return MenuActions.Close;
  } else
  if (key === Keys.Enter) {
    return MenuActions.CloseSelect;
  } else
  if (key === Keys.Backspace || key === Keys.Clear || key.length === 1) {
    return MenuActions.Type;
  }
}

// get index of option that matches a string
function getIndexByLetter(options, filter) {
  const firstMatch = filterOptions(options, filter)[0];
  return firstMatch ? options.indexOf(firstMatch) : -1;
}

// get updated option index
function getUpdatedIndex(current, max, action) {
  switch (action) {
    case MenuActions.First:
      return 0;
    case MenuActions.Last:
      return max;
    case MenuActions.Previous:
      return Math.max(0, current - 1);
    case MenuActions.Next:
      return Math.min(max, current + 1);
    default:
      return current;}

}

// check if an element is currently scrollable
function isScrollable(element) {
  return element && element.clientHeight < element.scrollHeight;
}

// ensure given child element is within the parent's visible scroll area
function maintainScrollVisibility(activeElement, scrollParent) {
  const { offsetHeight, offsetTop } = activeElement;
  const { offsetHeight: parentOffsetHeight, scrollTop } = scrollParent;

  const isAbove = offsetTop < scrollTop;
  const isBelow = offsetTop + offsetHeight > scrollTop + parentOffsetHeight;

  if (isAbove) {
    scrollParent.scrollTo(0, offsetTop);
  } else
  if (isBelow) {
    scrollParent.scrollTo(0, offsetTop - parentOffsetHeight + offsetHeight);
  }
}

/*
 * Multiselect Combobox w/ Buttons code
 */
const MultiselectButtons = function (el, options) {
  // element refs
  this.el = el;
  this.comboEl = el.querySelector('[role=combobox]');
  this.inputEl = el.querySelector('input');
  this.listboxEl = el.querySelector('[role=listbox]');

  this.idBase = this.inputEl.id;
  this.selectedEl = document.getElementById(`${this.idBase}-selected`);

  // data
  this.options = options;
  this.filteredOptions = options;

  // state
  this.activeIndex = 0;
  this.open = false;
};

MultiselectButtons.prototype.init = function () {

  this.inputEl.addEventListener('input', this.onInput.bind(this));
  this.inputEl.addEventListener('blur', this.onInputBlur.bind(this));
  this.inputEl.addEventListener('click', () => this.updateMenuState(true));
  this.inputEl.addEventListener('keydown', this.onInputKeyDown.bind(this));

  this.options.map((option, index) => {
    const optionEl = document.createElement('div');
    optionEl.setAttribute('role', 'option');
    optionEl.id = `${this.idBase}-${index}`;
    optionEl.className = index === 0 ? 'combo-option option-current' : 'combo-option';
    optionEl.setAttribute('aria-selected', 'false');
    optionEl.innerText = option;

    optionEl.addEventListener('click', () => {this.onOptionClick(index);});
    optionEl.addEventListener('mousedown', this.onOptionMouseDown.bind(this));

    this.listboxEl.appendChild(optionEl);
  });
};

MultiselectButtons.prototype.filterOptions = function (value) {
  this.filteredOptions = filterOptions(this.options, value);

  // hide/show options based on filtering
  const options = this.el.querySelectorAll('[role=option]');
  [...options].forEach(optionEl => {
    const value = optionEl.innerText;
    if (this.filteredOptions.indexOf(value) > -1) {
      optionEl.style.display = 'block';
    } else
    {
      optionEl.style.display = 'none';
    }
  });
};

MultiselectButtons.prototype.onInput = function () {
  const curValue = this.inputEl.value;
  this.filterOptions(curValue);

  // if active option is not in filtered options, set it to first filtered option
  if (this.filteredOptions.indexOf(this.options[this.activeIndex]) < 0) {
    const firstFilteredIndex = this.options.indexOf(this.filteredOptions[0]);
    this.onOptionChange(firstFilteredIndex);
  }

  const menuState = this.filteredOptions.length > 0;
  if (this.open !== menuState) {
    this.updateMenuState(menuState, false);
  }
};

MultiselectButtons.prototype.onInputKeyDown = function (event) {
  const { key } = event;

  const max = this.filteredOptions.length - 1;
  const activeFilteredIndex = this.filteredOptions.indexOf(this.options[this.activeIndex]);

  const action = getActionFromKey(key, this.open);

  switch (action) {
    case MenuActions.Next:
    case MenuActions.Last:
    case MenuActions.First:
    case MenuActions.Previous:
      event.preventDefault();
      const nextFilteredIndex = getUpdatedIndex(activeFilteredIndex, max, action);
      const nextRealIndex = this.options.indexOf(this.filteredOptions[nextFilteredIndex]);
      return this.onOptionChange(nextRealIndex);
    case MenuActions.CloseSelect:
      event.preventDefault();
      return this.updateOption(this.activeIndex);
    case MenuActions.Close:
      event.preventDefault();
      return this.updateMenuState(false);
    case MenuActions.Open:
      return this.updateMenuState(true);}

};

MultiselectButtons.prototype.onInputBlur = function () {
  if (this.ignoreBlur) {
    this.ignoreBlur = false;
    return;
  }

  if (this.open) {
    this.updateMenuState(false, false);
  }
};

MultiselectButtons.prototype.onOptionChange = function (index) {
  this.activeIndex = index;
  this.inputEl.setAttribute('aria-activedescendant', `${this.idBase}-${index}`);

  // update active style
  const options = this.el.querySelectorAll('[role=option]');
  [...options].forEach(optionEl => {
    optionEl.classList.remove('option-current');
  });
  options[index].classList.add('option-current');

  if (this.open && isScrollable(this.listboxEl)) {
    maintainScrollVisibility(options[index], this.listboxEl);
  }
};

MultiselectButtons.prototype.onOptionClick = function (index) {
  this.onOptionChange(index); //addinng item to list
  this.updateOption(index);//addinng item to list
  this.inputEl.focus();
};

MultiselectButtons.prototype.onOptionMouseDown = function () {
  this.ignoreBlur = true;
};

MultiselectButtons.prototype.removeOption = function (index) {
  const option = this.options[index];

  // update aria-selected
  const options = this.el.querySelectorAll('[role=option]');
  options[index].setAttribute('aria-selected', 'false');
  options[index].classList.remove('option-selected');

  // remove button
  const buttonEl = document.getElementById(`${this.idBase}-remove-${index}`);
  this.selectedEl.removeChild(buttonEl.parentElement);
};

MultiselectButtons.prototype.selectOption = function (index) {
  const selected = this.options[index];
  this.activeIndex = index;

  // update aria-selected
  const options = this.el.querySelectorAll('[role=option]');
  options[index].setAttribute('aria-selected', 'true');
  options[index].classList.add('option-selected');

  // add remove option button
  const buttonEl = document.createElement('button');
  const listItem = document.createElement('li');
  buttonEl.className = 'remove-option';
  buttonEl.type = 'button';
  buttonEl.id = `${this.idBase}-remove-${index}`;
  buttonEl.setAttribute('aria-describedby', `${this.idBase}-remove`);
  buttonEl.addEventListener('click', () => {this.removeOption(index);});
  buttonEl.innerHTML = selected + ' ';

  listItem.appendChild(buttonEl);
  this.selectedEl.appendChild(listItem);
};

MultiselectButtons.prototype.updateOption = function (index) {
  const option = this.options[index];
  const optionEls = this.el.querySelectorAll('[role=option]');
  const optionEl = optionEls[index];
  const isSelected = optionEl.getAttribute('aria-selected') === 'true';

  if (isSelected) {
    this.removeOption(index);
  } else

  {
    this.selectOption(index);
  }

  this.inputEl.value = '';
  this.filterOptions('');
};

MultiselectButtons.prototype.updateMenuState = function (open, callFocus = true) {
  this.open = open;

  this.comboEl.setAttribute('aria-expanded', `${open}`);
  open ? this.el.classList.add('open') : this.el.classList.remove('open');
  callFocus && this.inputEl.focus();
};

// init multiselect w/ inline buttons
const inlineButtonEl = document.querySelector('.js-inline-buttons');
const inlineButtonComponent = new MultiselectButtons(inlineButtonEl, options);
inlineButtonComponent.init();
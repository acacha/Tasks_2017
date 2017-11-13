import {mount} from 'vue-test-utils'
import expect from 'expect'
import Users from '../../resources/assets/js/components/Users.vue'
import moxios from 'moxios';

describe('Users', () => {
  let component

  const USERS = [
    {
      id: 1,
      name: 'Sergi',
      email: 'sergiturbadenas@gmail.com'
    },
    {
      id: 2,
      name: 'Pepe',
      email: 'pepe@pardojeans.com'
    },
    {
      id: 3,
      name: 'linus',
      email: 'linus@linux.com'
    }
  ]

  beforeEach(() => {
    moxios.install();

    component = mount(Users)
  })

  afterEach(() => {
    moxios.uninstall();
  });

  it('contains example', () => {
    expect(component.html()).toContain('example')
  })

  it('contains example with helper', () => {
    see('example')
  })

  it('expect users to be empty', () => {
    expect(component.vm.users).toEqual([])
  })

  it('expect users to be filled after mounted', done => {
    moxios.stubRequest('/api/v1/users', {
      status: 200,
      response: USERS
    });

    moxios.wait(() => {
      expect(component.vm.users).toBe(USERS)
      done()
    })
  })

  // Helper Functions

  let see = (text, selector) => {
    let wrap = selector ? component.find(selector) : component;

    expect(wrap.html()).toContain(text);
  };

  let type = (text, selector) => {
    let node = component.find(selector);

    node.element.value = text;
    node.trigger('input');
  };

  let click = selector => {
    component.find(selector).trigger('click');
  };

})
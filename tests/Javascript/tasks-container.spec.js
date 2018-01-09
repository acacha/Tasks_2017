import {mount} from 'vue-test-utils'
import expect from 'expect'
import Component from '../../resources/assets/js/acacha-tasks/components/tasks/TasksContainerComponent.vue'
import moxios from 'moxios';

describe('Component', () => {
  let component

  const TASKS = [
    {
      id: 1,
      name: 'Buy bread'
    },
    {
      id: 2,
      name: 'Study more PHP'
    },
    {
      id: 3,
      name: 'Learn vue'
    },
    {
      id: 4,
      name: 'WTF'
    }
  ]

  beforeEach(() => {
    moxios.install()
    component = mount(Component)
  })

  afterEach(() => {
    moxios.uninstall()
  })

  it('expect tasks to be filled after mounted with promise', done => {
    fetchTasks().then( () => {
      expect(component.vm.tasks).toBe(TASKS)
      done()
    })
  })

  // fetch tasks promise
  let fetchTasks = () => {
    return new Promise( (resolve, reject) => {
      moxios.stubRequest('/api/v1/tasks', {
        status: 200,
        response: TASKS
      });

      moxios.wait(() => {
        resolve()
      })
    })
  }

})
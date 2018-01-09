import {mount} from 'vue-test-utils'
import expect from 'expect'
import Component from '../../resources/assets/js/acacha-tasks/components/tasks/TasksCrudListComponent.vue'

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
    component = mount(Component)
  })

  it ('see tasks after setting them via prop', () => {
    component.setProps({ tasks: TASKS })
    expect(component.vm.tasks).toEqual(TASKS)

    TASKS.forEach(function (task) {
      expect(component.html()).toContain(task.name)
    })
  })
})


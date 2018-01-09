import axios from 'axios'

class Crud {
  constructor(endPoint) {
    this.endPoint = endPoint
  }
  getAll() {
    return axios.get(this.endPoint)
  }
  get(id) {
    return axios.get(this.endPoint + '/' + id)
  }
  add(resource) {
    return axios.post(this.endPoint, resource)
    // resource = {
    //   name: 'asddsa',
    //   description: 'asdasdasd'
    // }
  }
}

export default function createApi(endPoint) {
  return new Crud(endPoint);
}
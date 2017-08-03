import { Injectable } from '@angular/core';

@Injectable()
export class CourseService {

  constructor() { }

  courselist : Object[] =  [
    {"id":"1","course": "math", "teacher": "Budi"},
    {"id":"2","course": "Psychology", "teacher": "Ivan"},
  ]



}

import { Component, OnInit } from '@angular/core';
import { CourseService } from '../services/course.service';

@Component({
  selector: 'app-course-list',
  templateUrl: './course-list.component.html',
  styleUrls: ['./course-list.component.css']
})
export class CourseListComponent implements OnInit {

  constructor(private CourseService:CourseService) { }

  courselist: Object[];

  ngOnInit() {
  }

  newId : string = "";
  newCourse : string = "";
  newTeacher : string ="";

  addcourse(){

  this.CourseService.courselist.push({"id":this.newId,"course":this.newCourse, "teacher":this.newTeacher})

}

}

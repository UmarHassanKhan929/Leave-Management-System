import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

import { login } from  './login';
import { quota } from  './quota';
import { leave } from  './leave';
import { leaveStatus } from  './leaveStatus';
import { Observable } from  'rxjs';
import { leaveForm } from './leaveForm';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private httpClient: HttpClient) { }

  loginUser(user: login): Observable<login[]>{
    return this.httpClient.post<login[]>('https://leavems.epizy.com/leaveManPhp/login.php',user);
  }

  addUser(user: login): Observable<login>{
    return this.httpClient.post<login>(`https://leavems.epizy.com/leaveManPhp/add.php`,user);
  }
  readUsers(): Observable<login[]>{
    return this.httpClient.get<login[]>(`https://leavems.epizy.com/leaveManPhp/read.php`);
  }

  deleteUser(id: number): Observable<login>{
    return this.httpClient.delete<login>(`https://leavems.epizy.com/leaveManPhp/delete.php/?id=${id}`);
  }

  updateUser(user: login): Observable<login>{
    return this.httpClient.put<login>(`https://leavems.epizy.com/leaveManPhp/update.php`,user);   
  }

  readUsersLeaveForm(id:any, userId:any): Observable<leaveForm[]>{
    return this.httpClient.get<leaveForm[]>(`https://leavems.epizy.com/leaveManPhp/readLeaveForm.php/?id=${id}&&userId=${userId}`);
  }

  //HOD
  updateQuota(quota: quota): Observable<quota>{
    console.log(quota);
    return this.httpClient.put<quota>(`https://leavems.epizy.com/leaveManPhp/quota.php`,quota);   
  }

  facultyLeave(user: leave): Observable<leave>{
    return this.httpClient.post<leave>(`https://leavems.epizy.com/leaveManPhp/leaveFaculty.php`,user);
  }

  studentLeave(user: leave): Observable<leave>{
    return this.httpClient.post<leave>(`https://leavems.epizy.com/leaveManPhp/leaveStudent.php`,user);
  }

  readFacultyLeave(id:string): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readFacultyLeave.php/?id=${id}`);
  }

  readStudentLeave(id:string): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readStudentLeave.php/?id=${id}`);
  }

  facultyLeaveApprovalsPending(): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readPendingStudentLeave.php`);
  }

  facultyLeaveApprovalsApproved(): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readApprovedStudentLeave.php`);
  }

  facultyLeaveApprovalsRejected(): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readRejectedStudentLeave.php`);
  }

  approveStudentLeaveByFaculty(id:string){
    console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/approveStudentLeaveByFaculty.php/?id=${id}`,id);
  }

  rejectStudentLeaveByFaculty(id:string){
    console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/rejectStudentLeaveByFaculty.php/?id=${id}`,id);
  }



  hodLeaveApprovalsPendingForStuds(): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readPendingStudentLeaveHOD.php`);
  }
  hodLeaveApprovalsPendingForFacs(): Observable<leaveStatus[]>{
    return this.httpClient.get<leaveStatus[]>(`https://leavems.epizy.com/leaveManPhp/readPendingFacultyLeaveHOD.php`);
  }
 

  approveStudentLeaveHOD(id:string, msg:string){
    //console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/approveStudentLeaveByHOD.php/?id=${id}&&msg=${msg}`,id);
  }

  rejectStudentLeaveHOD(id:string,msg:string){
    //console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/rejectStudentLeaveByHOD.php/?id=${id}&&msg=${msg}`,id);
  }

  approveFacultyLeaveHOD(id:string ,msg:string){
    // console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/approveFacultyLeaveByHOD.php/?id=${id}&&msg=${msg}`,id);
  }

  rejectFacultyLeaveHOD(id:string,msg:string){
    //console.log("mic test 123 "+id);
    return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/rejectFacultyLeaveByHOD.php/?id=${id}&&msg=${msg}`,id);
  }



  deductLeave(id:string ,ldays:string){
     console.log("mic test 123 "+id);
     console.log("mic test 123 "+ldays);
     return this.httpClient.put<string>(`https://leavems.epizy.com/leaveManPhp/deductLeave.php/?id=${id}&&leave_left=${ldays}`,id);
  }
}

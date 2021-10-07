@extends('main')
@section('pagespecificscripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
@stop
@section('content')
<div class="new_edit">
    <form action="/cv_create/save" method="post" class="form">
        @csrf
        <h3>General Information</h3>
        <table>
            <tr>
                <td>
                    <input type="text" name="name" placeholder="Name">
                    <br>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <input type="text" name="surname" placeholder="Surname">
                    <br>
                    @error('surname')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder="Email">
                    <br>
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <input type="text" name="phone_number" placeholder="Phone number">
                    <br>
                    @error('phone_number')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="skills" placeholder="Skills" style="width: 171%">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="languages" placeholder="Languages" style="width: 171%">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="interests" placeholder="Interests" style="width: 171%">
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="additional_info" placeholder="Additional info" style="width: 171%">
                </td>
                <td></td>
            </tr>
        </table>
        <h3>Work experiance</h3>
        <div id="work_fields">
            <table>
                <tr>
                    <td>
                        <input type="text" name="company_name[]" placeholder="Company name">
                    </td>
                    <td>
                        <input type="text" name="job_title[]" placeholder="Job title">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="working_hours[]" placeholder="Working hours">
                        <br>
                        @error('working_hours.*')
                            <div>{{ $message }}</div>
                        @enderror
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        From: <select name="work_from[]">
                            <option value=""></option>
                            @for ($i = 1980; $i <= 2021; $i++)
                                <option  value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                    </td>
                    <td>
                        To: <select name="work_to[]">
                            <option value="Now">Now</option>
                            @for ($i = 1980; $i <= 2021; $i++)
                                <option  value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="work_description[]" placeholder="Description" style="width: 171%">
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <button type="button" onclick="addFields('work')">+ Add More Work Experiance</button>
        <h3>Education</h3>
        <div id="education_fields">
            <table>
                <tr>
                    <td>
                        <input type="text" name="school_name[]" placeholder="School name">
                    </td>
                    <td>
                        <input type="text" name="course_name[]" placeholder="Course name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="education_level[]" placeholder="Education level">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        From: <select name="education_from[]">
                            <option value=""></option>
                            @for ($i = 1980; $i <= 2021; $i++)
                                <option  value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        To: <select name="education_to[]">
                            <option value="Now">Now</option>
                            @for ($i = 1980; $i <= 2021; $i++)
                                <option  value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                    <tr>
                        <td><input type="text" name="education_description[]" placeholder="Description" style="width: 171%">
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div>
            <button type="button" onclick="addFields('education')">+ Add More Education Places</button>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@stop

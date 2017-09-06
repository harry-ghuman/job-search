@extends('layouts.master')
@section('page.title')
    Homepage
@endsection
@section('page.main')
    @include('partials.header')
    <div id="home">
        <div class="banner">
            <div class="container">
                <div class="title">
                    Job Search <span style="font-weight:lighter;font-size:30px;vertical-align:middle;">|</span> University of Windsor
                </div>
                <div class="title-blurb">
                    One Place. All University Jobs.
                </div>
            </div>
        </div>
        <div class="section mission">
            <div class="container">
                <div class="title">
                    Our Mission
                </div>
                <div class="divider">
                </div>
                <div class="title-blurb">
                    We create and deliver the best recruiting media, technologies and platforms for connecting university jobs and students. We strive every day to help Professors hire and help students find jobs.
                </div>
            </div>
        </div>
        <div class="section university">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6">
						<div class="col">
							<div class="col-inner">
								<div class="title">
									About UWindsor
								</div>
								<div class="divider">
								</div>
								<div class="title-blurb">
									The University of Windsor is a comprehensive university, with more than 15,000 students.
								</div>
								<a href="http://www.uwindsor.ca/about-the-university" class="btn btn-more" target="_blank">Read More</a>
							</div>
						</div>
					</div>
                    <div class="col-sm-6">
						<div class="col">
							<div class="col-inner">
								<div class="title">
									Latest News
								</div>
								<div class="divider">
								</div>
								<div class="title-blurb">
									Get all the latest university news, including current and upcoming events, ceremonies and student initiatives.
								</div>
								<a href="http://www.uwindsor.ca/dailynews" class="btn btn-more" target="_blank">Read More</a>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

<x-base-layout>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body pt-6">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
                <a class="navbar-brand" href="#">Telegram</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/updated-activity/telegram') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/updated-activity') }}">Check Activity</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <form action="{{ url('/updated-activity/send-message') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Enter your query"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</x-base-layout>

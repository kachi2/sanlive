@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.commands.run') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Reindex URLs (Google Indexing API)</h6>
                        <p class="text-muted">
                            Paste URLs to submit to Google for recrawling — one URL per line.
                            Useful for URLs exported from Search Console's Page indexing report
                            (e.g. "Crawled - currently not indexed"). Max 200 URLs per run (Google's daily quota).
                        </p>
                        <div class="form-group">
                            <textarea name="urls" rows="14" class="form-control @error('urls') is-invalid @enderror"
                                      placeholder="https://sanlivepharmacy.com/products/example-product&#10;https://sanlivepharmacy.com/catalogs/example-category">{{ old('urls') }}</textarea>
                            @error('urls')
                            <span class="invalid-feedback d-block"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="p-5">
                                    <button type="submit" class="text-center btn btn-primary w-100 p-3">Run Command</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if(session('results'))
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Results</h6>
                    @if(session('skipped'))
                    <p class="text-muted">{{ session('skipped') }} URL(s) skipped — over the 200/run quota limit. Run again to submit the rest.</p>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Error</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('results') as $r)
                                <tr>
                                    <td>{{ $r['url'] }}</td>
                                    <td>
                                        @if($r['success'])
                                        <span class="badge badge-success">Submitted</span>
                                        @else
                                        <span class="badge badge-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>{{ is_array($r['error'] ?? null) ? json_encode($r['error']) : ($r['error'] ?? '-') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

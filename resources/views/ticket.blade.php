<div id="item5" class="item">
    <div class="content">
        <div id="floating-panel">
            @if(!isset($ticket->error))
            <h3>Reservation No:</h3> <h3 id="reservation-id"></h3>
            <form>
                <div class="form-group">
                    <label for="reservation-url">Link:</label>
                    <input type="text" id="reservation-url" value="{{ $ticket->url or '' }}" name="reservation-url"/>
                </div>
                <div class="form-group">
                    <label for="reservation-name">Name:</label>
                    <input type="text" id="reservation-name" name="reservation-name" value="{{ $ticket->name or '' }}" required disabled/>
                </div>
                <div class="form-group">
                    <label for="reservation-name">Phone:</label>
                    <input type="text" id="reservation-phone" name="reservation-phone" value="{{ $ticket->phone or '' }}" required disabled/>
                </div>
                <div class="form-group">
                    <label for="reservation-name">Email:</label>
                    <input type="text" id="reservation-email" name="reservation-email" value="{{ $ticket->email or '' }}" required disabled/>
                </div>
                <div class="form-group">
                    <label for="reservation-address">Address:</label>
                    <input id="reservation-address" name="reservation-address" type="text" value="{{ $ticket->address or '' }}" required disabled/>
                </div>
                <div class="form-group">
                    <label for="reservation-date">Time:</label>
                    <input type="text" id="reservation-date" name="reservation-date" data-theme="app" value="{{ $ticket->date or '' }}" required disabled/>
                    <label for="reservation-from">From:</label>
                    <input type="text" id="reservation-from" value="{{ $ticket->from or '' }}" required disabled/>
                    <label for="reservation-until">Until:</label>
                    <input type="text" id="reservation-until" value="{{ $ticket->until or '' }}" required disabled/>
                </div>
                <div class="form-group">
                    <label for="reservation-maid">Maid:</label>
                    <input type="text" id="reservation-maid" value="{{ $ticket->maidName or '' }}" required disabled/>
                    <label for="reservation-rate">Rate:</label>
                    <input type="text" id="reservation-rate" value="{{ $ticket->rate or '' }}€/h" required disabled/>
                </div>
                <div class="form-group">
                    <input type="submit" id="cancel" class="btn btn-lg btn-danger" value="Cancel Reservation" />
                </div>
            </form>
                @else
            <h3>{{$ticket->error}}</h3>
                @endif
        </div>
    </div>
</div>
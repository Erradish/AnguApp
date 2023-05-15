import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ConversazioneComponent } from './conversazione.component';

describe('ConversazioneComponent', () => {
  let component: ConversazioneComponent;
  let fixture: ComponentFixture<ConversazioneComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ConversazioneComponent]
    });
    fixture = TestBed.createComponent(ConversazioneComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

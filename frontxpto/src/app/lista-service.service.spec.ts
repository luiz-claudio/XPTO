import { TestBed, inject } from '@angular/core/testing';

import { ListaServiceService } from './lista-service.service';

describe('ListaServiceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ListaServiceService]
    });
  });

  it('should be created', inject([ListaServiceService], (service: ListaServiceService) => {
    expect(service).toBeTruthy();
  }));
});
